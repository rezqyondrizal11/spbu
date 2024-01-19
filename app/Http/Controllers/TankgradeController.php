<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TankGrade;


class TankgradeController extends Controller
{
    public function index(Request $request)
    {
        $data = TankGrade::orderBy('id', 'ASC')->get();
        return view('tankgrade.index', compact('data'));
    }
    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        return view('tankgrade.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'harga' => 'required',

        ]);

        $input = $request->all();

        $data = TankGrade::create($input);


        return redirect()->route('tankgrade.index')
            ->with('success', 'Tank Grade created successfully');
    }

    public function edit($id)
    {
        $data = TankGrade::find($id);
        return view('tankgrade.edit', compact('data'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'harga' => 'required',

        ]);
        $input = $request->all();
        $data = TankGrade::find($request->id);
        $data->update($input);
        return redirect()->route('tankgrade.index')
            ->with('success', 'Tank Grade updated successfully');
    }

    public function destroy($id)
    {
        TankGrade::find($id)->delete();
        return redirect()->route('tankgrade.index')
            ->with('success', 'Tank Grade deleted successfully');
    }
}
