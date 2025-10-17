<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

// use Illuminate\Support\Facades\Session;
use Session;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::paginate(8);
        return view('department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["name"=>"required"]);
        $department = Department::create([
            'name'=> $request->name
        ]);
        if($department){
            //  Session::flash('success','department success');
            return redirect()->route('department.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::find($id);
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate(['name'=>['required','string']]);
            $department = Department::find($id);
            $department->name = $request->name;
            $department->save();
            return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index');
        if(!$department)    {
            return redirect()->route('department.index');
        }
}
}
