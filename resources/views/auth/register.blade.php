<style type="text/css">
body {
  background-image: -webkit-radial-gradient(center, circle cover, #59b459, #59b459 90%);
  background-image: -moz-radial-gradient(center, circle cover, #59b459, #59b459 80%);
  background-image: -o-radial-gradient(center, circle cover, #59b459, #59b459 80%);
  background-image: radial-gradient(center, circle cover, #59b459, #59b459 80%); 
}
#content1 {                                
  width: 100%;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
	animation: zoom 15s forwards;
}
@keyframes zoom {
	0% {
		transform: scale(1,1);
	}
	50% {
		transform: scale(1.2,1.2);
	}
	100% {
		transform: scale(1,1);
	}
}
.bg {
  animation:slide 3s ease-in-out infinite alternate;
  background-image: linear-gradient(-60deg, #ffce29 50%, #741299 50%);
  bottom:0;
  left:-50%;
  opacity:.1;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}
.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}
.bg3 {
  animation-duration:5s;
}
h1 {
  font-family:monospace;
}
@keyframes slide {
  0% {
	transform:translateX(-25%);
  }
  100% {
	transform:translateX(25%);
  }
}
.content {
  background-image: -webkit-radial-gradient(top, circle cover, #ffffff, #ffce29 90%);
  border-radius:.90em;
  box-shadow:0 0 .25em rgba(0,0,0,.25);
  box-sizing:border-box;
  left:50%;
  padding:4vmin;
  position:fixed;    
  top:50%;
  transform:translate(-50%, -50%);
  border:1px solid red;
}
h3 {
color:#000000;    
}
input {
text-indent: 5px;
}
</style>    
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    </head>
    <body>
        <main class="d-flex align-items-center min-vh-100">
            <div class="container">
                <div class="row no-gutters justify-content-md-center">
                    <div class="col-md-6 card login-card">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <div style="text-align:center">
                                    <img src="{{ asset('assets/images/PITAHCLogo.png') }}" ayylt="logo" class="logo" style="height: 180px; vertical-align: -50%;"><br><br>
                                    <b style="margin:17px; font-size:22px">PITAHC Accreditation and Certification</b><br><span style="letter-spacing:7px">Electronic Service System</span>
                                </div>
                            </div>
                            <p>Register</p>
                            <form method="post" action="{{ url('/register') }}" name="registration">
                            @csrf
                                <div class="form-group" id="div_userlevel_id">
                                    <label for="userlevel_id" class="sr-only">Userlevel</label>
                                    <select class="form-control @error('userlevel_id') is-invalid @enderror" id="userlevel_id" name="userlevel_id">
                                        <option selected>Select Userlevel</option>
                                            @foreach ($userlevels as $userlevel)
                                                <option value="{{ $userlevel->id }}" @if (old('userlevel_id') == $userlevel->id) selected="selected" @endif>{{ $userlevel->userlevel_name }}</option>
                                            @endforeach
                                    </select>
                                            @error('userlevel_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Userlevel is required.</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="form-group" id="div_last_name">
                                    <label for="name" class="sr-only">Last name</label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name') }}" placeholder="Last name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Last name is required.</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="form-group"id="div_first_name">
                                    <label for="first_name" class="sr-only">First name</label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}" placeholder="First name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Name is required.</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="form-group" id="div_email">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group" id="div_password">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group" id="div_password_confirmation">
                                    <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Retype password">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" onclick="showPassword()"><span class="ml-2">Show Password</span> 
                                </div>
                                <input name="register" id="register" class="btn btn-block login-btn" type="submit" value="Register">
                            </form>
                            <p class="login-card-footer-text"><a href="{{ route('login') }}" class="text-reset">I already have an account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
    <script>
    function showPassword() {
        var x = document.getElementById('password');
        var y = document.getElementById('password_confirmation');
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
    </script>
</html>


