<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHizzaHut - Home</title>

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
            border: 1px solid #FFAAAA;
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
        .content-header{
            margin-left: 150px;
        }
        .content{
            width: 60%;
            margin: auto;
        }
        .content ul {
            width: 30%;
            padding: 0;
            margin-right: 15px;
            list-style-type: none;
            border: 1px solid #BFBFBF;
            border-top: none;
            display: inline-block;
            background-color: white;
        }
        .content ul > li{
            margin-bottom: 5px;
            /* width: 300px; */
            text-align: center;
            display: block;
        }
        a.add-button{
            color: white;
            background-color: green;
            border-radius: 2px;
            padding: 5px 10px 5px 10px;
            margin-left: 155px;
            cursor: pointer;
            appearance: button;
            font-weight: 550;
        }
        a.edit-button{
            color: white;
            background-color: #24a0ed;
            border-radius: 2px;
            padding: 5px 10px 5px 10px;
            margin-right: 10px;
            margin-left: 25px;
        }
        a.delete-button{
            color: white;
            background-color: red;
            border-radius: 2px;
            padding: 5px 10px 5px 10px;
        }
        .pagination li {
            border: 1px solid rgb(219, 216, 240);
            padding: 5px 10px 5px 10px;
            background-clip: border-box;
        }
        .pagination li:hover {
            background-color: rgb(126, 111, 228);
            cursor: pointer;
        }
        .pagination {
            display: flex;
            padding: 5px 5px 5px 5px;
            list-style: none;
            border-radius: 0.25rem;
            justify-content: center;
        }
        .page-item.active .page-link {
            font-weight: 600;
            pointer-events: none;
            cursor: default;
        }
        .search-button{
            margin-left: 20px;
            padding: 0px 10px 0px 10px;
            text-align: center;
            background-color: #24a0ed;
            color: white;
            border-radius: 2px;
        }
        input{
            line-height: 2em;
        }
    </style>
</head>
<body>
    @if(!\Illuminate\Support\Facades\Auth::check())
        @include('header')
        <div class="content-header">
            <h1>Our Freshly Made Pizza!</h1>
            <h3>Order it Now!</h3>
            <form action="{{url()->current()}}">
                <div>
                    <input type="text" name="keyword" placeholder="Search pizza..." size="60" style="margin-left: 155px">
                    <input type="submit" class="search-button" value="Search">
                </div>
            </form>
        </div>
        <div class="content">
            @foreach($pizza as $p)
                <a href="/pizza/{{$p->id}}">
                <ul>
                    <li><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($p->image)) }}" height="220px" width="100%"></li>
                    <li style="font-weight: 600">{{$p->name}}</li>
                    <li style="font-weight: 550">Rp. {{$p->price}}</li>
                </ul>
                </a>
            @endforeach
        </div>
        <div class="pagination">
            {{$pizza->links()}}
        </div>
    @else
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
            @include('headerAdmin')
            <div class="content-header">
                <h1>Our Freshly Made Pizza!</h1>
                <h3>Order it Now!</h3>
                <a href="/add" class="add-button">Add Pizza</a>
            </div>
            <div class="content">
                @foreach($pizza as $p)
                    <a href="/pizza/{{$p->id}}">
                    <ul>
                        <li><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($p->image)) }}" height="220px" width="100%"></li>
                        <li style="font-weight: 600">{{$p->name}}</li>
                        <li style="font-weight: 550">Rp. {{$p->price}}</li>
                        <br>
                        <object><li><a href="/update/{{$p->id}}" class="edit-button">Update Pizza</a><a href="/delete/{{$p->id}}" class="delete-button">Delete Pizza</a></li></object>
                        <br>
                    </ul>
                    </a>
                @endforeach
            </div>
            <div class="pagination">
                {{$pizza->links()}}
            </div>
        @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Member')
            @include('headerUser')
            <div class="content-header">
                <h1>Our Freshly Made Pizza!</h1>
                <h3>Order it Now!</h3>
                <form action="{{url()->current()}}">
                    <div>
                        <input type="text" name="keyword" placeholder="Search pizza..." size="60" style="margin-left: 155px">
                        <input type="submit" class="search-button" value="Search">
                    </div>
                </form>
            </div>
            <div class="content">
                @foreach($pizza as $p)
                    <a href="/pizza/{{$p->id}}">
                    <ul>
                        <li><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($p->image)) }}" height="220px" width="100%"></li>
                        <li style="font-weight: 600">{{$p->name}}</li>
                        <li style="font-weight: 550">Rp. {{$p->price}}</li>
                    </ul>
                    </a>
                @endforeach
            </div>
            <div class="pagination">
                {{$pizza->links()}}
            </div>
        @endif
    @endif
</body>
</html>