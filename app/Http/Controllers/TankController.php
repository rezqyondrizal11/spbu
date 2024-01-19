<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tank;
use App\Models\TankGrade;
use App\Models\TankType;

class TankController extends Controller
{
    public function index(Request $request)
    {
        $data = Tank::orderBy('id', 'ASC')->get();
        return view('tank.index', compact('data'));
    }
    public function create()
    {
        $grade = TankGrade::get();
        $type = TankType::get();
        return view('tank.create', compact('grade', 'type'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'number' => 'required',


        // ]);
        $input = $request->all();

        $data = Tank::create($input);


        return redirect()->route('tank.index')
            ->with('success', 'Tank Grade created successfully');
    }

    public function edit($id)
    {
        $grade = TankGrade::get();
        $type = TankType::get();
        $data = Tank::find($id);
        return view('tank.edit', compact('data', 'type', 'grade'));
    }


    public function update(Request $request)
    {


        $input = $request->all();
        $data = Tank::find($request->id);
        $data->update($input);
        return redirect()->route('tank.index')
            ->with('success', 'Tank Grade updated successfully');
    }

    public function destroy($id)
    {
        Tank::find($id)->delete();
        return redirect()->route('tank.index')
            ->with('success', 'Tank Grade deleted successfully');
    }
}
