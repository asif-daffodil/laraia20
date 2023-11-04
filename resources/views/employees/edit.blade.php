@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-3">Edit Employee</h2>
                {{-- columns name: name, email, gender, phone, city --}}
                <form action="{{ route('employee.update', $employee->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Employee Name" class="form-control" name="name" value="{{ $employee->name }}">
                        <label for="">Employee Name</label>
                    </div>
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Employee Email" class="form-control" name="email" value="{{ $employee->email }}">
                        <label for="">Employee Email</label>
                    </div>
                    <div class="mb-3">
                        {{-- input gender with radio --}}
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label">Gender : </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Male" id="Male" name="gender" {{ $employee->gender == 'Male' ? 'checked' : '' }}>
                            <label for="Male" class="form-check-label">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="Female" id="Female" name="gender" {{ $employee->gender == 'Female' ? 'checked' : '' }}>
                            <label for="Female" class="form-check-label">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Employee Phone" class="form-control" name="phone" value="{{ $employee->phone }}">
                        <label for="">Employee Phone</label>
                    </div>
                    <div class="mb-3 form-floating ">
                        <input type="text" placeholder="Employee City" class="form-control" name="city" value="{{ $employee->city }}">
                        <label for="">Employee City</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Employee</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                {{-- show error message --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        <li>{{$err}}</li>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            <li>{{session()->get("success")}}</li>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
