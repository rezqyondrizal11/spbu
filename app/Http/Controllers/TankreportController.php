<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Tank;
use App\Models\TankReport;
use Illuminate\Support\Facades\Auth;

class TankreportController extends Controller
{
    public function index(Request $request)
    {
        $data = TankReport::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();

        return view('tankreport.index', compact('data'));
    }
    public function report(Request $request)
    {
        $data = TankReport::orderBy('id', 'DESC')->get();

        return view('tankreport.index2', compact('data'));
    }
    public function create()
    {
        $tankreport = TankReport::where('created_at', 'like', date('Y-m-d') . '%')->orderBy('id', 'ASC')->get();
        $tank = Tank::whereNotIn('id', $tankreport->pluck('id_tank'))->get();
        return view('tankreport.create', compact('tank'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_tank' => 'required',
            'kapasitas_awal' => 'required',
        ]);

        $input = $request->all();
        $input['kapasitas_stok'] = $input['kapasitas_awal'];
        $input['created_by'] = Auth::user()->id;
        $data = TankReport::create($input);


        return redirect()->route('tankreport.index')
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
