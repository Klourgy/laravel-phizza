<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View All Users</title>

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
            display: inline-block;
            background-color: white;
        }
        .content ul > li{
            padding: 10px 5px 10px 15px;
            margin-bottom: 5px;
            /* width: 300px; */
            display: block;
        }
        .content-header{
            background-color: red;
            color: white;
            font-weight: 550;
        }
    </style>
</head>
<body>
    @include('headerAdmin')
    <div class="content">
        @foreach($user as $u)
            <ul>
                <li class="content-header">User ID : {{$u->id}}</li>
                <li style="font-weight: 550">Username : {{$u->username}}</li>
                <li style="font-weight: 550">Email : {{$u->email}}</li>
                <li style="font-weight: 550">Address : {{$u->address}}</li>
                <li style="font-weight: 550">Phone Number : {{$u->phoneNumber}}</li>
                <li style="font-weight: 550">Gender : {{$u->gender}}</li>
            </ul>
        @endforeach
    </div>
</body>
</html>