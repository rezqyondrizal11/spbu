<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $data = Supplier::orderBy('id', 'ASC')->get();
        return view('Supplier.index', compact('data'));
    }
    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        return view('Supplier.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        $input = $request->all();

        $data = Supplier::create($input);


        return redirect()->route('supplier.index')
            ->with('success', 'Tank Grade created successfully');
    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('Supplier.edit', compact('data'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $data = Supplier::find($request->id);
        $data->update($input);
        return redirect()->route('supplier.index')
            ->with('success', 'Tank Grade updated successfully');
    }

    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('supplier.index')
            ->with('success', 'Tank Grade deleted successfully');
    }
}
