@extends('header')
@section('title', 'dashboard')
@section('content')
<div class="col-md-12">
    <h1 class="text-center text-success mt-5 text-white">Welcome!! to dashboard : <strong>{{$loginUserdata->name}}</strong></h1>
    <hr class="text-white">
    <table class="table mt-5">
        <thead class="table-success">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-white">
                <td>{{$loginUserdata->image}}</td>
                <td>{{$loginUserdata->name}}</td>
                <td>{{$loginUserdata->telephone}}</td>
                <td>{{$loginUserdata->email}}</td>
                <td>{{$loginUserdata->password}}</td>
                <td><button type="button" class="btn btn-dark text-white" id="update">
                        update
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <div class="col-12 ">
        <a href="logout" class="btn btn-danger mt-4 ">Logout</a>
    </div>
</div>
@endsection