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
        $query = TankReport::orderBy('id', 'DESC');

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $data = $query->get();


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

    public function edit($id)
    {
        $data = TankReport::find($id);

        $tank = Tank::get();
        return view('tankreport.edit', compact('tank', 'data'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'id_tank' => 'required',
            'kapasitas_awal' => 'required',
        ]);

        $input = $request->all();
        $input['kapasitas_stok'] = $input['kapasitas_awal'];
        $input['created_by'] = Auth::user()->id;
        $data = TankReport::find($request->id);
        $data->update($input);


        return redirect()->route('tankreport.index')
            ->with('success', ' tank berhasil di ubah');
    }

    public function destroy($id)
    {
        TankReport::find($id)->delete();
        return redirect()->route('tankreport.index')
            ->with('success', ' tank deleted successfully');
    }
    public function print(Request $request)
    {
        $query = TankReport::orderBy('id', 'DESC');

        // Tambahkan logika untuk pencarian berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $data = $query->get();
        $start =  $request->input('start_date');
        $end =  $request->input('end_date');
        return view('tankreport.print', compact('data', 'start', 'end'));
    }
}
