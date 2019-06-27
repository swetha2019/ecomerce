<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Web Admin panel</title>
<link rel="icon" type="image/png" href="template/images/fav.png">
<link rel="stylesheet" href="template/css/font-awesome.min.css">
<link rel="stylesheet" href="template/css/bootstrap.min.css">
<link rel="stylesheet" href="template/css/animate.min.css">
<link rel="stylesheet" href="template/css/style.css">
<link rel="stylesheet" href="template/css/color.css">
<link rel="stylesheet" href="template/css/responsive.css">
</head>
<body>
<!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>


     
<div class="panel-layout">
    <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
        <div class="admin-lock vh100">

          <div class="admin-form">
             @if ($errors->any())
    <div class="alert alert-danger" style=" color: green; font-weight:bold;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              <div class="logo"><img src="template/images/logo2.png" alt=""></div>

       
            <h4>Sign In Account</h4>
            <span>Please enter your user information</span>

 <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}
   <label> <i class="fa fa-user"></i> </label>
      <div class="form-group{{ $errors->has('email') || $errors->has('phone') ? ' has-error' : '' }}">
                                       
                    <input id="email"  type="text" name="email" placeholder="Mobile or Email Id"  required autofocus>
                      
                              </div>
                            

             <label><i class="fa fa-unlock-alt"></i></label>
       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              
  <input id="password" type="password"  name="password"  placeholder="Password" required>

                      
                            
                        </div>





          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Remember Me 
             @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                               
              <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
            </form>




            <span>Don't have an account? <a href="signup" title="">Sign up</a></span> </div>
             <div class="col-md-6">

                                    
                                  </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="template/js/jquery.js"></script> 
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/custom.js"></script>
</body>
</html>
