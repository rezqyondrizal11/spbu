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

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $data = $query->get();

        return view('salesreport.index2', compact('data'));
    }
    public function create()
    {
        $tank = TankReport::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();
        // $tank = Tank::whereNotIn('id', $tankreport->pluck('id_tank'))->get();
        return view('salesreport.create', compact('tank'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_tank_report' => 'required',
            'kapasitas' => 'required',
            'jam' => 'required',
        ]);
        $input = $request->all();
        if ($input['jam'] == 'pagi') {
            $input['jam_awal'] = "07:01";
            $input['jam_akhir'] = "14:00";
        } elseif ($input['jam'] == 'siang') {
            $input['jam_awal'] = "14:01";
            $input['jam_akhir'] = "22:00";
        } elseif ($input['jam'] == 'malam') {
            $input['jam_awal'] = "22:01";
            $input['jam_akhir'] = "07:00";
        }


        $tank = TankReport::where('id', $input['id_tank_report'])->first();
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
            'jam' => 'required',
        ]);

        $input = $request->all();
        if ($input['jam'] == 'pagi') {
            $input['jam_awal'] = "07:01";
            $input['jam_akhir'] = "14:00";
        } elseif ($input['jam'] == 'siang') {
            $input['jam_awal'] = "14:01";
            $input['jam_akhir'] = "22:00";
        } elseif ($input['jam'] == 'malam') {
            $input['jam_awal'] = "22:01";
            $input['jam_akhir'] = "07:00";
        }
        $input = $request->all();
        $data = SalesReport::find($request->id);
        $data->update($input);
        $tank = TankReport::where('id', $input['id_tank_report'])->first();
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
