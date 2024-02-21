<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SalesReport;
use App\Models\Supplier;
use App\Models\Tank;
use App\Models\TankReport;
use Illuminate\Support\Facades\Auth;

class SalesreportController extends Controller
{
    public function index(Request $request)
    {
        $data = SalesReport::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();

        return view('salesreport.index', compact('data'));
    }
    public function report(Request $request)
    {
        $query = SalesReport::orderBy('id', 'DESC');
        $start =  0;
        $end =  0;
        $id_tank  = "empty";

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($request->filled('start_date')) {
            $start =  $request->input('start_date');

            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $end =  $request->input('end_date');

            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }
        if ($request->filled('id_tank')) {
            $id_tank  = $request->input('id_tank');

            $tankreport = TankReport::whereDate('created_at', '>=', $request->input('start_date'))
                ->whereDate('created_at', '<=', $request->input('end_date'))
                ->where('id_tank', $request->input('id_tank'))
                ->orderBy('id', 'ASC')
                ->get();
            $tankarray = [];
            $tankarray = $tankreport->pluck('id')->toArray();
            $query->where('id_tank_report', $tankarray);
        }
        $data = $query->get();

        $tank = Tank::get();

        return view('salesreport.index2', compact('data', 'tank', 'start', 'end', 'id_tank'));
    }
    public function print($start, $end, $id_tank)
    {
        $query = SalesReport::orderBy('id', 'DESC');

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($start != 0) {
            $query->whereDate('created_at', '>=',  $start);
        }

        if ($end  != 0) {
            $query->whereDate('created_at', '<=', $end);
        }

        if ($id_tank  != 'empty') {

            $tankreport = TankReport::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('id_tank', $id_tank)
                ->orderBy('id', 'ASC')
                ->get();
            $tankarray = [];
            $tankarray = $tankreport->pluck('id')->toArray();
            $query->where('id_tank_report', $tankarray);
        }
        $data = $query->get();

        $tank = Tank::get();

        return view('salesreport.print', compact('data', 'start', 'end'));
    }
    public function create()
    {
        $tank = TankReport::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();
        $shift  = ['pagi', 'siang', 'malam'];

        // $tank = Tank::whereNotIn('id', $tankreport->pluck('id_tank'))->get();
        return view('salesreport.create', compact('tank', 'shift'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_tank_report' => 'required',
            'kapasitas' => 'required',
            'jam' => 'required',
        ]);
        $input = $request->all();
        $tank = TankReport::where('id', $input['id_tank_report'])
            ->where('created_at', 'like', date('Y-m-d') . '%')

            ->first();
        if ($tank->kapasitas_stok < $input['kapasitas']) {

            return redirect()->route('salesreport.create')
                ->with('error', 'Kapasitas Melebihi Stok Maksimum');
        }
        if ($input['jam'] == 'pagi') {
            $input['jam_awal'] = "07:01";
            $input['jam_akhir'] = "14:00";

            $checksales = SalesReport::where('id_tank_report', $tank->id)
                ->where('created_at', 'like', date('Y-m-d') . '%')
                ->where('jam_akhir', "14:00:00")
                ->first();

            if ($checksales) {

                return redirect()->route('salesreport.create')
                    ->with('error', 'Shift Telah Input, Silahkan isi Shift yang lainnya');
            }
        } elseif ($input['jam'] == 'siang') {
            $input['jam_awal'] = "14:01";
            $input['jam_akhir'] = "22:00";
            $checksales = SalesReport::where('id_tank_report', $tank->id)
                ->where('created_at', 'like', date('Y-m-d') . '%')
                ->where('jam_akhir', "22:00:00")
                ->first();

            if ($checksales) {

                return redirect()->route('salesreport.create')
                    ->with('error', 'Shift Telah Input, Silahkan isi Shift yang lainnya');
            }
        } elseif ($input['jam'] == 'malam') {
            $input['jam_awal'] = "22:01";
            $input['jam_akhir'] = "07:00";
            $checksales = SalesReport::where('id_tank_report', $tank->id)
                ->where('created_at', 'like', date('Y-m-d') . '%')
                ->where('jam_akhir', "07:00:00")
                ->first();

            if ($checksales) {

                return redirect()->route('salesreport.create')
                    ->with('error', 'Shift Telah Input, Silahkan isi Shift yang lainnya');
            }
        }


        $revenue = $tank->tank->grade->harga;
        $input['harga'] =  $revenue;

        $input['created_by'] = Auth::user()->id;
        $data = SalesReport::create($input);

        $tank->kapasitas_stok =  $tank->kapasitas_stok -  $input['kapasitas'];
        $tank->save();


        return redirect()->route('salesreport.index')
            ->with('success', 'kapasitas tank berhasil di isi untuk hari ini');
    }

    public function edit($id)
    {
        $tank = TankReport::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();


        $data = SalesReport::find($id);
        return view('salesreport.edit', compact('data', 'tank'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'id_tank_report' => 'required',
            'kapasitas' => 'required',

        ]);

        $input = $request->all();
        $tank1 = TankReport::where('id', $input['id_tank_report'])
            ->where('created_at', 'like', date('Y-m-d') . '%')

            ->first();
        $tank1->kapasitas_stok =  $tank1->kapasitas_stok + $input['kapasitas_awal'];
        if ($tank1->kapasitas_stok < $input['kapasitas']) {

            return redirect()->route('salesreport.create')
                ->with('error', 'Kapasitas Melebihi Stok Maksimum');
        }

        $input = $request->all();
        $data = SalesReport::find($request->id);
        $data->update($input);
        $tank = TankReport::where('id', $input['id_tank_report'])
            ->where('created_at', 'like', date('Y-m-d') . '%')->first();
        $tank->kapasitas_stok =  $tank->kapasitas_stok + $input['kapasitas_awal'] -  $input['kapasitas'];
        $tank->save();
        return redirect()->route('salesreport.index')
            ->with('success', 'updated successfully');
    }

    public function destroy($id)
    {

        $data = SalesReport::find($id);
        $tank = TankReport::where('id', $data->id_tank_report)->first();
        $tank->kapasitas_stok =  $tank->kapasitas_stok + $data->kapasitas;
        $tank->save();
        SalesReport::find($id)->delete();
        return redirect()->route('salesreport.index')
            ->with('success', 'deleted successfully');
    }
}
