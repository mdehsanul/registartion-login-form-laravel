@extends('header')
@section('title', 'Login form')
@section('content')
        <!-- -------- Login form -------- -->
        <div class="col-md-7 form-container">
            <h1 class="text-center mb-5 text-white">Login</h1>
            <form class="row g-2 d-flex justify-content-center align-items-center mt-5" action="loginform" method="post" id="login_form">
                @csrf
                <div class="col-md-8 form-validation">
                    <label for="email" class="form-label fs-5 text-white">Email</label>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="loginemail" name="loginemail" placeholder="Email. ex: abc@gmail.com">
                    </div>
                </div>
                <div class="col-md-8 mb-3 form-validation">
                    <label for="password" class="form-label fs-5 text-white"> Password</label>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-8 d-grid  mb-3">
                    <button type="submit" value="submit" class="btn text-white" name="login">Login</button>
                </div>
                <!-- don't have an account -->
                <div class="form-group col-md-7 text-center">
                    <p class="text-white">Don't have account? <a href="/registrationform" class="fw-bold" id="signup">Sign up here</a></p>
                </div>
            </form>
        </div>

        
        {{-- jQuery-validate --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script> 
        <script>
            $(document).ready(function () {
                $("#login_form").validate({
                    rules: {
                        loginemail: {
                            required: true,
                            loginemail: true,
                        },
                        loginpassword: {
                            required: true,
                            minlength: 5,
                        }
                    },
                    messages: {
                        loginpassword: {
                            required: "Please enter your password",
                            minlength: "Your password must consists of at least 5 character",
                        }
                    },
                });
            });
        
        jQuery.validator.addMethod(
            "loginemail",
            function (value, element) {
                return (
                    this.optional(element) ||
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)
                );
            },
            "Please enter a valid email address."
        );
        </script>
@endsection