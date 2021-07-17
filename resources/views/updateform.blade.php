@extends('header')
@section('title', 'update')
@section('content')
<div class="col-md-12">
    {{--update form---}}
<div class="col-md-7 mt-md-5 form-container">
    <h1 class="text-center mb-2 text-white">update your account</ul></h1>
    <hr class="text-white">
    <form class="row g-2 justify-content-center align-items-center form" method="post" action="/update">
        @csrf
        <input type="hidden" name="id"value="{{$data['id']}}">
        <div class="col-md-8 form-validation">
            <label for="name" class="form-label fs-5 text-white">Usrer Name</label>
            <div class="mb-2">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$data['name']}}">
            </div>
        </div>
        <div class="col-md-8 form-validation ">
            <label for="telephone" class="form-label fs-5 text-white"> Telephone</label>
            <div class="mb-2">
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="{{$data['telephone']}}">
            </div>
        </div>
        <div class="col-md-8 form-validation ">
            <label for="password" class="form-label fs-5 text-white"> Password</label>
            <div class="mb-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$data['password']}}">
            </div>
        </div>
        <div class="col-md-8">
            <label for="cpassword" class="form-label fs-5 text-white">Confirm Password</label>
            <div class="mb-2">
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" value="{{$data['cpassword']}}">
            </div>
        </div>
        <div class="col-md-8 mb-4">
            <label for="image" class="form-label fs-5 text-white">Upload Image</label>
            <div>
                <input type="file" name="image" class="form-control p-2" value="{{$data['image']}}">
            </div>
        </div>
        <div class="col-md-8 d-grid mb-2">
            <button type="submit" class="btn text-white form-button" name="register" value="submit">Update</button>
        </div>
    </form>
</div>
@endsection