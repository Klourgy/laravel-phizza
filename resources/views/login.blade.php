<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <style>
        html{
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body{
            overflow-x:hidden;
            margin: 0;
            padding: 0;
            height: 100%;
            /* background-color: #fffdf8; */
            font-family: 'Open Sans', sans-serif;
        }
        a:link, a:visited, a:hover, a:active {
            text-decoration:none;
            color: inherit;
        }
        .header{
            background-color: red;
            height: 8%;
            width: 100%;
            font-family: 'Nunito', sans-serif;
            color: white;
            font-weight: 550;
        }
        .logo{
            float: left;
            margin-left: 250px;
        }
        .header-text{
            font-size: 18px;
            margin: 14px 0px 0px 10px;
            float: left;
        }
        .header-navigation{
            text-align: right;
            font-size: 16px;
            margin: 0;
            padding-right: 150px;
        }
        .header-navigation ul{
            list-style: none;
            display: inline-flex;
        }
        .header-navigation ul li{
            padding-right: 15px;
        }
        .header-navigation ul li span{
            border: 1px solid #FFAAAA;
            margin-left: 15px;
        }
        /* login */
        .form{
            border: 1px solid #BFBFBF;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
            font-family: 'Open Sans', sans-serif;
            background-color: white;
        }
        .form-header{
            background-color: red;
            color: white;
            font-weight: 550;
            padding: 10px 0px 10px 20px;
        }
        .form-label{
            text-align: right;
            display: inline-block;
            width: 35%;
            margin-right: 15px;
            font-weight: 550;
        }
        .form-checkbox{
            margin-left: 289px;
        }
        .login-button{
            margin-top: 15px;
            margin-left: 350px;
            margin-bottom: 15px;
            padding: 0px 10px 0px 10px;
            text-align: center;
            background-color: #24a0ed;
            color: white;
            border-radius: 2px;
        }
        .text-danger{
            color: red;
            margin-left: 290px;
        }
        input{
            line-height: 2em;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="form">
        <div class="form-header">
            Login
        </div>
        <br>
        <form method="POST" action={{url('/doLogin')}}>
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="form-label">E-mail Address:</label>
            <input type="text" name="email" placeholder="E-mail" size="40">
            <br>
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <br>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" placeholder="Password" size="40">
            <br>
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <input type="checkbox" name="remember" class="form-checkbox">
        <label for="remember" style="font-weight: 550">Remember Me</label>
        <input type="submit" value="Login" class="login-button">
        </form>
    </div>
</body>
</html>