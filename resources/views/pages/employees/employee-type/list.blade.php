@extends('master')
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="card">
            @include('partials.flash')
            <div class="card-header text-center">
                <h3 class="card-title">Employee Type</h3>
                <a href="{{route('employee.type.add')}}" class="btn btn-primary pull-right">Add Employee Type</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.I</th>
                        <th>Employee Type</th>
                        <th>Payment Type</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($allEmployeeType) > 0)
                            @foreach($allEmployeeType as $employeeType)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$employeeType->employee_type_name}}</td>
                                    <td>{{$employeeType->payment_type == 1 ? "Daily" : "Monthly"}}</td>
                                    <td>{{$employeeType->salary}}</td>
                                    <td>
                                        <a href="{{route('employee.type.edit',['employee_type_id' => $employeeType->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('employee.type.delete',['employee_type_id' => $employeeType->id])}}" class="btn btn-danger">Delete</a>
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


