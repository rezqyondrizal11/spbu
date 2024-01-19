<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TankType;

class TanktypeController extends Controller
{
    public function index(Request $request)
    {
        $data = TankType::orderBy('id', 'ASC')->get();
        return view('tanktype.index', compact('data'));
    }
    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        return view('tanktype.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        $input = $request->all();

        $data = TankType::create($input);


        return redirect()->route('tanktype.index')
            ->with('success', 'Tank Grade created successfully');
    }

    public function edit($id)
    {
        $data = TankType::find($id);
        return view('tanktype.edit', compact('data'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $data = TankType::find($request->id);
        $data->update($input);
        return redirect()->route('tanktype.index')
            ->with('success', 'Tank Grade updated successfully');
    }

    public function destroy($id)
    {
        TankType::find($id)->delete();
        return redirect()->route('tanktype.index')
            ->with('success', 'Tank Grade deleted successfully');
    }
}
