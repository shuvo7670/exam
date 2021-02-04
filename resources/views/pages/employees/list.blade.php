@extends('master')
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="card">
            @include('partials.flash')
            <div class="card-header text-center">
                <h3 class="card-title">Employee Type</h3>
                <a href="{{route('employee.add')}}" class="btn btn-primary pull-right">Add Employee Type</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.I</th>
                        <th>Employee Name</th>
                        <th>Employee Type</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($allEmployee) > 0)
                            @foreach($allEmployee as $employee)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$employee->employee_name}}</td>
                                    <td>{{$employee->employee_type->employee_type_name}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>{{$employee->employee_type->salary}}</td>
                                    <td>
                                        <img src="{{asset('uploads/profile-picture/'.$employee->profile_picture)}}" width="70" alt="">
                                    </td>
                                    <td>
                                        <a href="{{route('employee.edit',['employee_id' => $employee->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('employee.delete',['employee_id' => $employee->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h2 class="text-center text-danger">Table Field Is Empty</h2>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
@endsection


