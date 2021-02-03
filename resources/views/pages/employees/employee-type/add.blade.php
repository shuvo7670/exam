@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-6 mt-3 offset-md-3">
            <div class="card card-info">
                @include('partials.flash')
                <div class="card-header text-center">
                    <h3 class="card-title">Add Employee Type</h3>
                    <a href="{{route('employee.type.list')}}" class="btn btn-primary pull-right">All Employee Type</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('employee.type.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="employeeType">Employee Type Name : </label>
                            <div>
                                <input type="text" name="employee_type_name" class="form-control" id="employeeType">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Select Payment Type : </label>
                            <select name="payment_type" class="form-control">
                                <option value="1">Daily</option>
                                <option value="2">Monthly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary : </label>
                            <div>
                                <input type="number" name="salary" class="form-control" id="salary">
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
