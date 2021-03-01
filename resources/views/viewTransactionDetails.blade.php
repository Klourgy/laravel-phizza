<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Details</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
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
            font-family: 'Nunito', sans-serif;
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
            border-left: 2px solid #FFAAAA;
            margin-left: 15px;
        }
        .fa-caret-down{
            margin-left: 10px;
        }
        .dropdown-menu{
            display: none;
        }
        .header-navigation ul li:hover .dropdown-menu{
            display: block;
            position: absolute;
            background: red;
        }
        .dropdown-menu ul{
            display: block;
            position: absolute;
            background: red;
        }
        .dropdown-menu ul li{
            padding-top: 35px;
            padding-bottom: 25px;
            left: 20%;
            transform: translate(-20%, 0);
        }
        /* content */
        .container{
            width: 70%;
            background-color: white;
            margin: auto;
            display: flex;
            margin-top: 25px;
            padding: 10px 10px 10px 20px;
            border: 1px solid #DFDFDF;
        }
        .content-section-1{
            width: 30%;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 20px;
        }
        .content-section-2{
            padding-top: 20px;
            width: 70%;
            padding-left: 5px;
        }
    </style>
</head>
<body>
    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
        @include('headerAdmin')
    @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Member')
        @include('headerUser')
    @endif
    @foreach($order as $o)
        <div class="container">
            <div class="content-section-1">
                <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($o->pizza->image)) }}" height="200px" width="250px">
            </div>
            <div class="content-section-2">
                <h3>{{$o->pizza->name}}</h3>
                <span style="font-weight: 550">Rp. {{$o->pizza->price}}</span>
                <br>
                <span style="font-weight: 550">Quantity : {{$o->quantity}}</span>
                <br>
                <span style="font-weight: 550">Total Price : Rp. {{$o->quantity * $o->pizza->price}}</span>
            </div>
        </div>
    @endforeach
</body>
</html>