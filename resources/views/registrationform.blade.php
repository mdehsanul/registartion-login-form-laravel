@extends('header')
@section('title', 'Registration form')
@section('content')
        <!-- -------- Registration form -------- -->
        <div class="col-md-7 mt-md-5 form-container">
            <h1 class="text-center mb-2 text-white">Create an account</ul></h1>
            <hr class="text-white">
            <form class="row g-2 justify-content-center align-items-center form" method="post" action="{{route('user-register-success')}}"  id="registration_form">
                @if (Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif
                @csrf
                <div class="col-md-8 form-validation">
                    <label for="name" class="form-label fs-5 text-white">Usrer Name</label>
                    <div class="mb-2">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-8 form-validation ">
                    <label for="telephone" class="form-label fs-5 text-white"> Telephone</label>
                    <div class="mb-2">
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telephone">
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="email" class="form-label fs-5 text-white">Email</label>
                    <div class="mb-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email. ex: abc@gmail.com">
                        <span class="text-dark">@error('email') {{$message}} @enderror</span>{{-- buildin validation from UseerController.php --}}
                    </div>
                </div>
                <div class="col-md-8 form-validation ">
                    <label for="password" class="form-label fs-5 text-white"> Password</label>
                    <div class="mb-2">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="cpassword" class="form-label fs-5 text-white">Confirm Password</label>
                    <div class="mb-2">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="col-md-8 mb-4">
                    <label for="image" class="form-label fs-5 text-white">Upload Image</label>
                    <div>
                        <input type="file" name="image" class="form-control p-2">
                    </div>
                </div>
                <div class="col-md-8 d-grid mb-2">
                    <button type="submit" class="btn text-white form-button" name="register" value="submit">Register
                        Now</button>
                </div>
                <div class="col-md-8 text-center">
                    <p class="text-white">Already Registered? <a href="loginform" class="fw-bold" id="alreadyRegistered">Login</a></p>
                </div>
            </form>
        </div>

       {{-- jQuery-validate --}}
         <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script> 
        <script>
            $(document).ready(function () {
                $("#registration_form").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 2,
                        },
                        telephone: {
                            required: true,
                            telephone: true,
                        },
                        email: {
                            required: true,
                            email: true,
                            uniqueEmail: true 
                        },
                        password: {
                            required: true,
                            minlength: 5,
                        },
                        cpassword: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password",
                        },
                        image: {
                            required: true,
                            extension: "jpeg|png",
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter your name",
                            minlength: "Your name must consists of at least 2 character",
                        },
                        password: {
                            required: "Please enter your password",
                            minlength: "Your password must consists of at least 5 character",
                        },
                        cpassword: {
                            required: "Please provide a password",
                            minlength: "Your password must consists of at least 5 character",
                            equalTo: "Please enter the same password as above",
                        },
                    },
                });
            });

        jQuery.validator.addMethod(
            "email",
            function (value, element) {
                return (
                    this.optional(element) ||
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)
                );
            },
            "Please enter a valid email address."
        );
        
        jQuery.validator.addMethod(
            "telephone",
            function (value, element) {
                return (
                    this.optional(element) ||
                    /^(?:\+?88|0088)?01[15-9]\d{8}$/.test(value)
                );
            },
            "Please enter a valid 11 digit phone number"
        );
        
        </script>
@endsection


{{-- @csrf mean Cross-Side-Request-Forgery. 
    And @req is recognising the user input data, because you are making an post request in your web.php file, 
    so the @csrf fetch your data and store,it'll be used to verify that the authenticated user is the one actually 
    making the requests to the application. --}}