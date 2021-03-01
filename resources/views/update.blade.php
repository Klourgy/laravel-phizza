<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Pizza</title>

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
            width: 30%;
            margin-top: auto;
            margin-bottom: auto;
        }
        .content-section-2{
            width: 70%;
            padding-left: 15px;
        }
        .form-label{
            display: inline-block;
            width: 30%;
            font-weight: 550;
        }
        .update-button{
            margin-top: 15px;
            margin-left: 150px;
            margin-bottom: 15px;
            padding: 0px 10px 0px 10px;
            text-align: center;
            background-color: #24a0ed;
            color: white;
            border-radius: 2px;
        }
        .text-danger{
            color: red;
            margin-left: 280px;
        }
        input{
            line-height: 2em;
        }
    </style>
</head>
<body>
    @include('headerAdmin')
    <div class="container">
        <div class="content-section-1">
            <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($pizza->image)) }}" height="250px" width="100%">
        </div>
        <div class="content-section-2">
            <h1>Edit Pizza Details</h1>
            <br>
            <form method="POST" enctype="multipart/form-data" action={{url('/updatePizza')}}>
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$pizza->id}}">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="form-label">Pizza Name:</label>
                    <input type="text" name="name" placeholder="Name" size="60">
                    <br>
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <br>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="price" class="form-label">Pizza Price:</label>
                    <input type="text" name="price" placeholder="Price" size="60">
                    <br>
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>
                <br>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="form-label">Pizza Description:</label>
                    <input type="text" name="description" placeholder="Description" size="60">
                    <br>
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
                <br>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="form-label">Pizza Image:</label>
                    <input type="file" name="image" size="60">
                    <br>
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>
                <br>
                <input type="submit" value="Edit Pizza" class="update-button">
                </form>
            </form>
        </div>
    </div>
</body>
</html>