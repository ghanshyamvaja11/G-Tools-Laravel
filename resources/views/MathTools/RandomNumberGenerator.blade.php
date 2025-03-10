@extends('Layout.main')
@push('title')
    <title>G Tools - Random Number Generator</title>
@endpush
@section('Content_Information')

@push('title')
    <title>G Tools-Random Number</title>
@endpush
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

    #GenerateRandomNumber{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #GenerateRandomNumber:hover{
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
    @if ($Email)
    <center><h2 style=" color: LightGreen; font-size: 128%;">Random Number Generator</h2>
    <hr></center>
<section>
    <br>
    <br>
        <div id="sec">
        <center>
    <form method="GET" action="{{url('/')}}/MathController/RandomNumber">
    @csrf
    <input type="text" name="Lower"
    inputmode="decimal"
    pattern="[0-9]*[.,]?[0-9]*"
    PlaceHolder="Enter Lower Limit " style='height: 29px; width: 284px; font: 29px; ' required><p>
    <input type="text" name="Upper"
    inputmode="decimal"
    pattern="[0-9]*[.,]?[0-9]*"
    PlaceHolder="Enter Upper Limit " style='height: 29px; width: 284px; font: 29px; ' required><p>
    
    <p>
    <input type="Submit" value="Generate Random Number" id="GenerateRandomNumber" name="GenerateRandomNumber">
    </form>
        </center>
        </div>
    </section>
    <br>
    <br>
    
{{-- @if(isset($_GET['Lower']) && isset($_GET['Upper']))
    
    <center><h2 style='color: LightBlue; display: inline; text-align: center;'>Generated Random Number</h2><p><h2 style="color: white; font-size: 168%;">
@php
$Lower = $_GET['Lower'];
$Upper = $_GET['Upper'];

echo rand($Lower, $Upper);
@endphp

@endif --}}
@if (isset($Answer))
    <center><h2 style='color: LightBlue; display: inline; text-align: center;'>Generated Random Number</h2><p><h2 style='color: white; font-size: 168%;'>{{$Answer}}</h2><center>
@endif
</h2>
@else
<script>
window.location.href="/login";
</script>
    @endif
</main>
@endsection