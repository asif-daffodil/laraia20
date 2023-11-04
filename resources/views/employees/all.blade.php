@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                All Employees
                <table class="table table-striped ">
                    <tr>
                        <td>S.N.</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Phone</td>
                        <td>City</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->gender}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->city}}</td>
                            <td>
                                <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{route('employee.destroy', $employee->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{-- use boostrap pagination --}}
                {{$employees->links()}}
            </div>
        </div>
    </div>
@endsection
