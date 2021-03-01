<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$pizza->name}}</title>

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
        h1{
            margin: 0;
            padding: 0;
        }
        p{
            margin-top: 0;
            padding-top: 0;
            font-weight: 550;
        }
        .container{
            width: 70%;
            background-color: white;
            margin: auto;
            display: flex;
            margin-top: 25px;
            padding: 10px 10px 10px 10px;
            border: 1px solid #DFDFDF;
        }
        .content-section-1{
            width: 55%;
        }
        .content-section-2{
            width: 45%;
            padding-left: 15px;
        }
        .form-label{
            margin-right: 20px;
            font-weight: 550;
        }
        .add-cart-button{
            background-color: #24a0ed;
            color: white;
            border-radius: 2px;
            padding: 5px 10px 5px 10px;
            margin-left: 20px;
            margin-top: 30px;
        }
        .text-danger{
            color: red;
        }
    </style>
</head>
<body>
    @if(!\Illuminate\Support\Facades\Auth::check())
        @include('header')
        <div class="container">
            <div class="content-section-1">
                <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($pizza->image)) }}" height="450px" width="100%">
            </div>
            <div class="content-section-2">
                <h1>{{$pizza->name}}</h1>
                <br>
                <p>{{$pizza->description}}</p>
                <br>
                <span style="font-weight: 550">Rp. {{$pizza->price}}</span>
            </div>
        </div>
    @else
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
            @include('headerAdmin')
            <div class="container">
                <div class="content-section-1">
                    <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($pizza->image)) }}" height="450px" width="100%">
                </div>
                <div class="content-section-2">
                    <h1>{{$pizza->name}}</h1>
                    <br>
                    <p>{{$pizza->description}}</p>
                    <br>
                    <span style="font-weight: 550">Rp. {{$pizza->price}}</span>
                </div>
            </div>
        @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Member')
            @include('headerUser')
            <div class="container">
                <div class="content-section-1">
                    <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($pizza->image)) }}" height="450px" width="100%">
                </div>
                <div class="content-section-2">
                    <h1>{{$pizza->name}}</h1>
                    <br>
                    <p>{{$pizza->description}}</p>
                    <br>
                    <span style="font-weight: 550">Rp. {{$pizza->price}}</span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <form method="POST" action={{url('/addOrder')}}>
                        {{csrf_field()}}
                        <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" name="quantity" size="30" min="1">
                            <br>
                            <small class="text-danger">{{ $errors->first('quantity') }}</small>
                        </div>
                        <input type="submit" value="Add to Cart" class="add-cart-button">
                    </form>
                </div>
            </div>
        @endif
    @endif
</body>
</html>