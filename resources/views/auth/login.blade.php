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
  <title>PITAHC Accreditation and Certification Electronic Service System</title>
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
            <p>Sign into your account</p>
              <form method="post" action="{{ url('/login') }}">
                  @csrf
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" value="{{ old('email') }}"class="form-control @error('email') is-invalid @enderror" placeholder="Email address">
                  @error('email')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="***********">
                  <input type="checkbox" onclick="showPassword('password')"><span class="ml-2">Show Password</span>  
                  @error('password')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
              </form>
              <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot password?</a>
              <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
              <nav class="login-card-footer-nav">
                <a href="#!">Terms of use.</a>
                <a href="#!">Privacy policy</a>
              </nav>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    function showPassword(id) {
      var x = document.getElementById(id);
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>
</html>
