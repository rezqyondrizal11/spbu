<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tankdelivery;
use App\Models\Supplier;
use App\Models\Supply;
use App\Models\Tank;
use App\Models\TankReport;
use Illuminate\Support\Facades\Auth;

class TankdeliveryController extends Controller
{
    public function index(Request $request)
    {
        $data = Tankdelivery::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();

        return view('Tankdelivery.index', compact('data'));
    }
    public function create()
    {
        $tank = Tank::get();

        $supplier = Supplier::get();
        $supply    = Supply::get();
        // $tank = Tank::whereNotIn('id', $tankreport->pluck('id_tank'))->get();
        return view('Tankdelivery.create', compact('tank', 'supplier', 'supply'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'do_volume' => 'required',
            'id_tank' => 'required',
            'id_don' => 'required',
            'driver' => 'required',
            'vehicle_number' => 'required',
            'id_supplier' => 'required',
            'id_supply' => 'required',
        ]);

        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $data = Tankdelivery::create($input);


        $tank = Tank::where('id', $input['id_tank'])->first();
        $tankreport = TankReport::where('id_tank', $tank->id)
            ->where('created_at', 'like', date('Y-m-d') . '%')
            ->first();
        $tankreport->kapasitas_stok =  $tankreport->kapasitas_stok + $data->do_volume;
        $tankreport->save();



        return redirect()->route('tankdelivery.index')
            ->with('success', ' tank berhasil di isi ');
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