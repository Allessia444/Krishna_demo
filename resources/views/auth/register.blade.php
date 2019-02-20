<!DOCTYPE html>
<html>
<head>
   <head>
    <meta charset="utf-8">
    <title>DeskApp Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('/css/main.css') !!}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-119386393-1');
    </script>
</head>
</head>
<body>
    <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="login-box bg-white box-shadow pd-30 border-radius-5">
            <img src="vendors/images/login-img.png" alt="login" class="login-img">
            <h2 class="text-center mb-30">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="input-group custom input-group-lg">
                     <input id="name" type="text" placeholder="Username" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="input-group custom input-group-lg">
                     <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="input-group custom input-group-lg">
                     <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="input-group custom input-group-lg">
                       <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                       @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
                  
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                             <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="forgot-password padding-top-10"><a href="forgot-password.php">Forgot Password</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
     <script src="{!! asset('/js/main.js') !!}"></script>
</body>
</html>