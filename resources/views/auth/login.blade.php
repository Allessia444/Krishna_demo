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
            <h2 class="text-center mb-30">Login</h2>
             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <div class="input-group custom input-group-lg">
            <input type="text" class="form-control"  name="email" value="{{ old('email') }}" autofocus>
                    @if($errors->has('email'))<p class="help-block" style="color: #721c24">{!! $errors->first('email') !!}</p>@endif
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                </div>
                 <div class="input-group custom input-group-lg">
                    <input type="password" class="form-control" placeholder="**********" name="password">
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                    @if($errors->has('password'))<p class="help-block" style="color: #721c24">{!! $errors->first('password') !!}</p>@endif
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{!! asset('/js/main.js') !!}"></script>
</body>
</html>