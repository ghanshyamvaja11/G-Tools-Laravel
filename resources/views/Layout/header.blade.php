<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('title')

    <style>
        body {
            margin: 0;
            background-color: black;
        }

        #header, #menu {
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: black;
            padding: 9.9px;
        }
        
        #menu {
            text-align: center;
            border-radius: 15px;
            height: 24px;
            background: white;
        }

        #menu a {
            font-family: serif;
            color: black;
            padding: 6.9px;
            text-decoration: none;
        }

        #menu a:hover {
            color: blue;
            background-color: yellow;
            border-radius: 29%;
        }

        #content {
            padding: 20px;
        }
        #Logout{
            height: 29px;
            width: 69px;
            border: 2px solid black;
            border-radius: 6.9px;
            font: 19.9px;
            font-weight: 411;
            cursor: pointer;
        }
        #Logout:hover{
            background: black;
            color: white;
        }
    </style>
</head>
<body>
    <header id="header">
        <center><img src="{{asset('G Tools.png')}}" style="width: 96px; height: 95px;"></center>
        <div id="menu">
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('')}}/tools">Tools</a>
        <a href="{{url('/')}}/About_Us">About us</a>
        <a href="{{url('/')}}/Contact_Us">Contact us</a>
        <hr><br>
        @if ($Email)
        <span style="color: skyblue; font-size: 19.9px;">{{$Email}}</span>
        <a href="{{url('')}}/sessiondestroy"><button id="Logout">Logout</button></a>
        @endif
    </div>
    @if ($Email)
    <br><br><br><br>
    <hr>
    @endif
    </header>
</body>
</html>