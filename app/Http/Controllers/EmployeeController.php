<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEmployee = Employee::all();
        return view('pages.employees.list',compact('allEmployee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allEmployeeType = EmployeeType::all();
        return view('pages.employees.add',compact('allEmployeeType'));
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
            'employee_name' => 'required',
            'employee_type_id'  => 'required',
            'address'  => 'required',
            'phone'  => 'required'
        ]);
        // Validation End
        try {
            $employee = new Employee();
            $employee->employee_name = $request->employee_name;
            $employee->employee_type_id = $request->employee_type_id;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            if ($request->hasFile('profile_picture')) {
                $image = $request->file('profile_picture');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/profile-picture/');
                $image->move($destinationPath, $name);
                $employee->profile_picture = $name;
            }
            $employee->save();
            return back()->with('message','Employee Added Successfully');
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
        $singleEmployee = Employee::findOrFail($request->employee_id);
        $allEmployeeType = EmployeeType::all();
        return view('pages.employees.edit',compact('singleEmployee','allEmployeeType'));
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
        'employee_name' => 'required',
        'employee_type_id'  => 'required',
        'address'  => 'required',
        'phone'  => 'required'
        ]);
        // Validation End
        try {
            $employee = Employee::findOrFail($request->employee_id);
            $employee->employee_name = $request->employee_name;
            $employee->employee_type_id = $request->employee_type_id;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            if ($request->hasFile('profile_picture')) {
                // Delete Old Image
                if (isset($employee->profile_picture)){
                    unlink('uploads/profile-picture/'.$employee->profile_picture);
                }
                // End Delete Old Image
                $image = $request->file('profile_picture');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/profile-picture/');
                $image->move($destinationPath, $name);
                $employee->profile_picture = $name;
            }
            $employee->save();
            return back()->with('message','Employee Updated Successfully');
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
        $employee = Employee::findOrFail($request->employee_id);
        if (isset($employee->profile_picture)){
            unlink('uploads/profile-picture/'.$employee->profile_picture);
        }
        $employee->delete();
        return back()->with('message','Successfully Employee Deleted');
    }
}
