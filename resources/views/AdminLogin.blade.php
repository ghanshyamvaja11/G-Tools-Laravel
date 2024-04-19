@extends('Layout.main')

@push('title')
<title>G Tools - Admin Login</title>
@endpush

@section('Content_Information')
<style>
    .disclaimer{
        display: none;
    }
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

#menu{
    text-align: center;
    display: block;
    background-color: white;
    border-radius: 15px;
    height: 29px;
    padding-top: 9.6px;
}

#menu a{
    font-weight: Bold;
    color: black;
    padding: 6px;
    text-decoration: none;
}

#menu a:hover{
    color: blue;
    background-color: yellow;
    border-radius: 29%;
}

    #Login{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Login:hover{
        color: white;
        font-size: 19px;
        background-color: black;
        border: 2px solid green;
        border-radius: 29px;
    }
textarea {
  resize: none;
}
</style>

<main>
    <center><h2 style=" color: LightGreen; font-size: 128%;">Admin Login</h2>
    <hr></center>
    @if(isset($NotFound))
              <center><span style="font-size: 15.9px; color: red;">{{$NotFound}}</span></center>
    @endif
<section>
    <br>
    <br>
        <div id="sec">
        <center>
            <form action="{{url('/')}}/AdminLogin" method="POST">
                @csrf
    <input type="text" name="Email" 
    PlaceHolder="Enter email " style="height: 42px; width: 168px; font: 29px;" required>
<br>
@error('Email')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
<br>
<input type="Password" name="Password" 
    PlaceHolder="Enter Password" style="height: 42px; width: 168px; font: 29px;" required>
    <br>
    @error('Password')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
    <p>
    
    <p>
    <input type="Submit" value="Login" id="Login" name="Login">
    </form>
        </center>
        </div>
    </section>
@endsection