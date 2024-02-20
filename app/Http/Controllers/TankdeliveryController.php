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
    public function report(Request $request)
    {
        $query = Tankdelivery::orderBy('id', 'DESC');

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $data = $query->get();

        return view('Tankdelivery.index2', compact('data'));
    }

    public function print(Request $request)
    {
        $query = Tankdelivery::orderBy('id', 'DESC');

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $data = $query->get();

        return view('Tankdelivery.print', compact('data'));
    }
    public function create()
    {
        $tank = Tank::get();

        $supplier = Supplier::get();
        $supply    = Supply::get();
        $tanks = TankReport::where('created_at', 'like', date('Y-m-d') . '%')
            ->get();

        return view('Tankdelivery.create', compact('tank', 'supplier', 'supply', 'tanks'));
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

        $tank = Tank::where('id', $input['id_tank'])->first();

        $tankreport = TankReport::where('id_tank', $tank->id)
            ->whereDate('created_at', now()->toDateString())
            ->first();

        $checkstok =  $input['do_volume'] +  $tankreport->kapasitas_stok;
        if ($checkstok  >   $tank->capacity) {
            return redirect()->route('tankdelivery.create')
                ->with('error', 'Melebihi Kapasitas Maximum Tank');
        }

        $input['created_by'] = Auth::user()->id;
        $data = Tankdelivery::create($input);



        $tankreport->kapasitas_stok =  $tankreport->kapasitas_stok + $data->do_volume;
        $tankreport->save();



        return redirect()->route('tankdelivery.index')
            ->with('success', ' tank berhasil di isi ');
    }

    public function edit($id)
    {
        $tank = Tank::get();
        $supplier = Supplier::get();
        $supply    = Supply::get();
        $data = Tankdelivery::find($id);
        $tanks = TankReport::where('created_at', 'like', date('Y-m-d') . '%')
            ->get();

        return view('Tankdelivery.edit', compact('data', 'tank', 'supplier', 'supply', 'tanks'));
    }


    public function update(Request $request)
    {
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
        $data = Tankdelivery::find($request->id);
        $data->update($input);

        $tank = Tank::where('id', $input['id_tank'])->first();
        $tankreport = TankReport::where('id_tank', $tank->id)
            ->where('created_at', 'like', date('Y-m-d') . '%')
            ->first();
        $tankreport->kapasitas_stok = $tankreport->kapasitas_stok - $request->do_volume_lama + $data->do_volume;
        $tankreport->save();

        return redirect()->route('tankdelivery.index')
            ->with('success', 'updated successfully');
    }

    public function destroy($id)
    {

        Tankdelivery::find($id)->delete();
        return redirect()->route('tankdelivery.index')
            ->with('success', ' deleted successfully');
    }
}
