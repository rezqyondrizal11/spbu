<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supply;


class SupplyController extends Controller
{
    public function index(Request $request)
    {
        $data = Supply::orderBy('id', 'ASC')->get();
        return view('Supply.index', compact('data'));
    }
    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        return view('Supply.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        $input = $request->all();

        $data = Supply::create($input);


        return redirect()->route('Supply.index')
            ->with('success', 'Tank Grade created successfully');
    }

    public function edit($id)
    {
        $data = Supply::find($id);
        return view('Supply.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $data = Supply::find($request->id);
        $data->update($input);
        return redirect()->route('Supply.index')
            ->with('success', 'Tank Grade updated successfully');
    }

    public function destroy($id)
    {
        Supply::find($id)->delete();
        return redirect()->route('Supply.index')
            ->with('success', 'Tank Grade deleted successfully');
    }
}
