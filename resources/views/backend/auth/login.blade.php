<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ Config::get('yap.sitename') }}</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="{{{ asset('imges/favicon16.png') }}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->        
    <style type="text/css">
        body {
            background-size: cover;
            font-family: Montserrat;
        }

        .logo {
            width: 213px;
            height: 36px;
            background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
            margin: 30px auto;
        }

        .login-block {
            width: 320px;
            padding: 20px;
            background: #fff;
            box-shadow: 5px 5px 40px rgba(0,0,0,0.55);                
            border-radius: 5px;
            border: 1px solid #c87d21; 
            border-top: 5px solid #c87d21;
            margin: 0 auto;
        }

        .login-block h1 {
            text-align: center;
            color: #000;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .login-block input {
            width: 100%;
            height: 42px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 14px;
            font-family: Montserrat;
            padding: 0 20px 0 50px;
            outline: none;
        }

        .login-block input#email {
            background: #fff url("{{ asset('images') . '/email.png' }}") 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#email:focus {
            background: #fff url("{{ asset('images') . '/email.png' }}") 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password {
            background: #fff url("{{ asset('images') . '/password.png' }}") 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password:focus {
            background: #fff url("{{ asset('images') . '/password.png' }}") 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input:active, .login-block input:focus {
            border: 1px solid #c87d21;
        }

        .login-block #submit {
            width: 100%;
            height: 40px;
            background: #db8924;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #c87d21;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            font-family: Montserrat;
            outline: none;
            cursor: pointer;
        }

        .login-block #submit:hover {
            background: #b4711e;
        }
    </style>  
</head>
    
<body>
    <div class="container">    
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <div class="logo">
            <img alt="{{ Config::get('yap.sitename') }}" height="110" src="{{ asset('/images') . '/' . Config::get('yap.logo') }}" style='max-width: 100%;height: auto' /></p>
        </div>
        <div class="login-block">
            @if( session('message') )
                <div class="alert alert-danger">
                    <p>{{ session('message') }}</p>
                </div>
            @endif   
            
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif            
            <h1>Login</h1>
            {{ Form::open(array('action' => 'Backend\DashboardController@getDashboard')) }}
            {{ Form::text('email', '', ['placeholder' => trans('yap.email'), 'id'=>'email']) }}
            {{ Form::password('password', ['placeholder' => trans('yap.password'), 'id'=>'password']) }}
            {{ Form::submit(trans('yap.login'), ['id' => 'submit']) }}
            {{ Form::close() }}
        </div>
    </div>
    
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>   