<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEmployeeType = EmployeeType::all();
        return view('pages.employees.employee-type.list',compact('allEmployeeType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employees.employee-type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Start
        $request->validate([
            'employee_type_name' => 'required',
            'payment_type'  => 'required',
            'salary'  => 'required'
         ]);
        // Validation End
        try {
            $employee_type = new EmployeeType();
            $employee_type->employee_type_name = $request->employee_type_name;
            $employee_type->payment_type  = $request->payment_type;
            $employee_type->salary  = $request->salary;
            $employee_type->save();
            return back()->with('message','Employee Type Added Successfully');
        } catch (Exception $e) {
            return back()->with('error','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $singleEmployeeType = EmployeeType::findOrFail($request->employee_type_id);
        return view('pages.employees.employee-type.edit',compact('singleEmployeeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validation Start
        $request->validate([
            'employee_type_name' => 'required',
            'payment_type'  => 'required',
            'salary'  => 'required'
        ]);
        // Validation End
        try {
            $employee_type = EmployeeType::findOrFail($request->employee_type_id);
            $employee_type->employee_type_name = $request->employee_type_name;
            $employee_type->payment_type  = $request->payment_type;
            $employee_type->salary  = $request->salary;
            $employee_type->update();
            return back()->with('message','Employee Type Updated Successfully');
        } catch (Exception $e) {
            return back()->with('error','Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee_type = EmployeeType::findOrFail($request->employee_type_id);
        $employee_type->delete();
        return back()->with('message','Employee Type Deleted Successfully');
    }
}
