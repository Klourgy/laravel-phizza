<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
        html{
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #fffdf8;
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
        /* register */
        .form{
            border: 1px solid #BFBFBF;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 25px;
            font-family: 'Nunito', sans-serif;
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
        .register-button{
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
            Register
        </div>
        <br>
        <form method="POST" action={{url('/doRegister')}}>
        {{csrf_field()}}
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" placeholder="Username" size="40">
            <br>
            <small class="text-danger">{{ $errors->first('username') }}</small>
        </div>
        <br>
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
        <br>
        <div class="form-group{{ $errors->has('confirm') ? ' has-error' : '' }}">
            <label for="confirm" class="form-label">Confirm Password:</label>
            <input type="password" name="confirm" placeholder="Confirm Password" size="40">
            <br>
            <small class="text-danger">{{ $errors->first('confirm') }}</small>
        </div>
        <br>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="form-label">Address:</label>
            <input type="text" name="address" placeholder="Address" size="40">
            <br>
            <small class="text-danger">{{ $errors->first('address') }}</small>
        </div>
        <br>
        <div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
            <label for="phoneNumber" class="form-label">Phone Number:</label>
            <input type="text" name="phoneNumber" placeholder="Phone Number" size="40">
            <br>
            <small class="text-danger">{{ $errors->first('phoneNumber') }}</small>
        </div>
        <br>
        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="form-label">Gender:</label>
            <input type="radio" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" value="female">
            <label for="female">Female</label>
            <br>
            <small class="text-danger">{{ $errors->first('gender') }}</small>
        </div>
        <br>
        <input type="submit" value="Register" class="register-button">
        </form>
    </div>
</body>
</html>