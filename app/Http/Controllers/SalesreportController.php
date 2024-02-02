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
        $data = SalesReport::orderBy('id', 'DESC')->get();

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

    // public function edit($id)
    // {
    //     $data = Supplier::find($id);
    //     return view('Supplier.edit', compact('data'));
    // }


    // public function update(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //     ]);
    //     $input = $request->all();
    //     $data = Supplier::find($request->id);
    //     $data->update($input);
    //     return redirect()->route('Supplier.index')
    //         ->with('success', 'Tank Grade updated successfully');
    // }

    // public function destroy($id)
    // {
    //     Supplier::find($id)->delete();
    //     return redirect()->route('Supplier.index')
    //         ->with('success', 'Tank Grade deleted successfully');
    // }
}
