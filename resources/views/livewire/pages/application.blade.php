<div>
<style type="text/css">
body {
  background-image: -webkit-radial-gradient(center, circle cover, #59b459, #59b459 90%);
  background-image: -moz-radial-gradient(center, circle cover, #59b459, #59b459 80%);
  background-image: -o-radial-gradient(center, circle cover, #59b459, #59b459 80%);
  background-image: radial-gradient(center, circle cover, #59b459, #59b459 80%); 
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
@keyframes slide {
  0% {
	transform:translateX(-25%);
  }
  100% {
	transform:translateX(25%);
  }
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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <style>
      body {
        background-color: #fff;
      }

      .container {
        padding-top: 50px;
        text-align: center;
      }

      .card {
        margin-bottom: 30px;
      }

      h1 {
        color: #000;
        font-family: monospace;
        font-weight: bold;
        margin-bottom: 20px;
      }

      .image-container {
        position: relative;
        overflow: hidden;
      }

      .text-container {
        position: absolute;
        bottom: -100%; /* Initially hide the text */
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.8);
        color: #fff;
        padding: 10px;
        transition: bottom 0.1s ease; /* Add a smooth sliding animation */
      }

      .image-container:hover .text-container {
        bottom: 0; /* Show the text when hovering over the image */
      }

      .text-container span {
        display: block;
      }

      .grayscale-img {
        filter: grayscale(70%); /* Desaturate the image */
        transition: filter 0.3s ease; /* Add a smooth transition effect */
      }

      .image-container:hover .grayscale-img {
        filter: none; /* Remove the grayscale effect on hover */
      }
      </style>
      <title>PITAHC Accreditation and Certification Electronic Service System</title>
    </head>
    <body>
      <div class="container">
        <div class="card">
          <div class=" mt-3" style="text-align:center">
            <img src="{{ asset('assets/images/PITAHCLogo.png') }}" ayylt="logo" class="logo" style="height: 180px; vertical-align: -50%;"><br>
              <b style="margin:17px; font-size:22px">PITAHC Accreditation and Certification</b><br><span style="letter-spacing:7px">Electronic Service System</span><br><br>
          </div>
          <div class="row">
            <div class="col-md-12 text-left ml-5 mb-3">
              <h6 class="m-0 text-dark">Choose Application:</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card ml-5">
                <div class="image-container">
                  <a href="{{ route('apply-certification') }}">
                    <img src="{{ asset('assets/images/apply.jpg') }}" class="card-img-top grayscale-img" alt="Application for Certification/ Accreditation">
                  </a>
                  <div class="text-container">
                    <span>Application for Certification/ Accreditation</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mr-5">
                <div class="image-container">
                  <a href="#">
                    <img src="{{ asset('assets/images/application.png') }}" class="card-img-top grayscale-img" alt="Renewal of Application">
                  </a>
                  <div class="text-container">
                    <span>Renewal of Application</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
  </html>
</div>
