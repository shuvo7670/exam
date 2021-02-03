@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-6 mt-3 offset-md-3">
            <div class="card card-info">
                @include('partials.flash')
                <div class="card-header text-center">
                    <h3 class="card-title">Add Employee</h3>
                    <a href="{{route('employee.list')}}" class="btn btn-primary pull-right">All Employee</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('employee.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="employeeType">Employee Name : </label>
                            <div>
                                <input type="text" name="employee_name" class="form-control" id="employeeType">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Select Employee Type : </label>
                            <select name="employee_type_id" class="form-control">
                                @foreach($allEmployeeType as $employeeType)
                                    <option value="{{$employeeType->id}}">{{$employeeType->employee_type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address : </label>
                            <div>
                                <input type="text" name="address" class="form-control" id="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone : </label>
                            <div>
                                <input type="number" name="phone" class="form-control" id="phone">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
