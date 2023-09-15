<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--fontawesome Files -->
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <!--fontawesome Files -->

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

    <title></title>
  </head>
  <body>

 

<div class="formm">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
	
<form action="{{ route('login') }}" method="POST">
  @csrf
<div class="formmm">
	<h4 class="Login mb-2">Login</h4>
	<h3 class="Login mb-4">Welcome Back!</h3>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" placeholder="Email/Username/Mobile No" />

  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" placeholder="Enter Your Password " />
   
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
   <div class="col-sm-auto px-1 mb-2">
      <button type="button" class="btn btn-primary w-100">Login</button>
    </div>


  <!-- Register buttons -->
  <div class="text-center">
    <p class="mt-2">Dont't have an account?  <a href="#!">Sign up</a></p>
    <div class="or"><span>OR</span></div>
    <hr class="line"></hr>
 


<button class="loginBtn loginBtn--facebook">
   <i class="fab fa-google me-2"></i>Login with google
</button>
    <button class="loginBtnn loginBtn--facebook">
  <i class="fab fa-facebook-square"></i>Login with facebook
</button>
    <button class="loginBtnnn loginBtn--facebook">
<i class="fas fa-phone-square-alt"></i>Login with mobile no
</button>



    
  </div></div>
</form>
</div>

			


</div></div></div>




   <script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
 <script src="js/jquery.js"></script>



  </body>
</html>