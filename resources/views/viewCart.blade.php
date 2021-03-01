<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{\Illuminate\Support\Facades\Auth::user()->username}} - Cart</title>

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
        h3{
            padding: 0;
            margin: 0;
        }
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
        .form-label{
            margin-right: 20px;
            font-weight: 550;
        }
        .update-cart-button{
            background-color: #24a0ed;
            color: white;
            border-radius: 2px;
            padding: 5px 14px 5px 13px;
            margin-top: 20px;
            cursor: pointer;
        }
        .delete-button{
            background-color: red;
            color: white;
            border-radius: 2px;
            padding: 5px 10px 5px 10px;
            cursor: pointer;
        }
        .checkout-button{
            background-color: green;
            color: white;
            border-radius: 2px;
            padding: 5px 10px 5px 10px;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 700px;
            margin-bottom: 40px;
        }
        .text-danger{
            color: red;
        }
        .message{
            text-align: center;
            margin-top: 150px;
            font-style: italic;
            font-weight: 550;
            color: #BFBFBF;
        }
    </style>
</head>
<body>
    @include('headerUser')
    @if($order->isEmpty())
        <div class="message">
            No Order in Cart
        </div>
    @else
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
                    <br>
                    <form method="POST" action={{url('/updateOrder')}}>
                        {{csrf_field()}}
                        <input type="hidden" name="o_id" value="{{$o->id}}">
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" name="quantity" size="30" min="1">
                            <br>
                            <small class="text-danger">{{ $errors->first('quantity') }}</small>
                        </div>
                        <input type="submit" value="Update Quantity" class="update-cart-button">
                    </form>
                    <form method="POST" action={{url('/deleteOrder')}}>
                        {{csrf_field()}}
                        <input type="hidden" name="o_id" value="{{$o->id}}">
                        <br>
                        <input type="submit" value="Delete From Cart" class="delete-button">
                    </form>
                </div>
            </div>
        @endforeach
        <form method="POST" action={{url('/checkout')}}>
            {{csrf_field()}}
            <input type="hidden" name="o_id" value="{{$o->id}}">
            <br>
            <input type="submit" value="Checkout" class="checkout-button">
        </form>
    @endif
</body>
</html>