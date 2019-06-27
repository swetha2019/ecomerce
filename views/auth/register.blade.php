


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
    <link rel="stylesheet" href="template/css/themify-icons.css">
    <link rel="stylesheet" href="template/css/line-icons.css">
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
            <div class="logo"><img src="template/images/logo2.png" alt=""></div>
            <h4>Sign Up Account</h4>
            <span>Please enter your user information</span>
<!--form of sign up-->


<p id="passwordHelpBlock" class="form-text text-muted" style=" background-color: lightgreen">
        Your password must atleast 8 character, should contain  Uppercase, Lowercase, Numeric and special character.
</p>

            <form method="POST" action="{{ route('register') }}">
                       {{csrf_field()}}
              <label><i class="fa fa-user-circle-o"></i></label>

     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Company Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

               <br> @if ($errors->has('name'))

                <span class="text-danger">{{ $errors->first('name') }}</span>

            @endif

              <label><i class="fa fa-phone"></i></label>

     <input id="name" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Mobile Number" value="{{old('phone')}}" required autocomplete="phone" autofocus>

                              
              <br> @if ($errors->has('phone'))

                <span class="text-danger">{{ $errors->first('phone') }}</span>

            @endif

               <label><i class="fa fa-envelope"></i></label>

               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
                             

              <br>  @if ($errors->has('email'))

                <span class="text-danger">{{ $errors->first('email') }}</span>

            @endif

             <label><i class="fa fa-unlock-alt"></i></label>
 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                 
               <br> @if ($errors->has('password'))

                <span class="text-danger">{{ $errors->first('password') }}</span>

            @endif



              <label><i class="fa fa-unlock-alt"></i></label>

               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                       <br> @if ($errors->has('password_confirmation'))

                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>

            @endif


              <input type="checkbox" id="checkbox" name="terms" value="true" {{ !old('terms') ?: 'checked' }}>
              <label for="checkbox">I accept the <a href="#" title="">terms & Conditions</a></label>
  <br> @if ($errors->has('terms'))

                <span class="text-danger">{{ $errors->first('terms') }}</span>

            @endif
                   
              <button type="submit">sign up</button>



            </form>
            <span>Already a member? <a href="signin" title="">Sign in</a></span> </div>
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


