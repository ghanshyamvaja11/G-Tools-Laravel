@extends('Layout.main')
@section('Content_Information')
@push('title')
    <title>G Tools - Percentage</title>
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

    #Percentage{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Percentage:hover{
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
    <center><h2 style=" color: LightGreen; font-size: 128%;">Percentage Calculator</h2>
    <hr></center>
<section>
    <br>
    <br>
        <div id="sec">
        <center>
            <form method="GET" action="{{url('/')}}/MathController/Percentage">

    <input type="text" name="P" 
    inputmode="decimal"
    PlaceHolder="Enter Value " style='height: 29px; width: 100px; font: 29px; ' pattern="[0-9]*[.,]?[0-9]*" required><h4 style="color: white; font-size: 24px; display: inline;"> %</h4>
    &nbsp; &nbsp; <h4 style="color: white; font-size: 24px; display: inline;">of</h4>
 
<input type="text" name="V" 
    inputmode="decimal"
    PlaceHolder="Enter Value " style='height: 29px; width: 100px; font: 29px; ' pattern="[0-9]*[.,]?[0-9]*" required><p>

        @error('P')
<br>
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
@error('V')
<br>
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
    <p>
    <input type="Submit" value="Calculate" id="Percentage" name="Percentage">
    </form>
        </center>
        </div>
    </section>
    <br>
    <br>

@if (isset($P) && isset($V))
    <center><h2 style='color: LightBlue; display: inline; text-align: center;'>Result</h2><p>

        <h2 style="color: white; font-size: 95%;"><span style="color: yellow; font-size: 105%;">{{$P}} % of {{$V}}  = {{($P/100)}} * {{$V}} =</span>{{(($P * $V)/100)}}</h2>
    </center>
@endif
@else
<script>
    window.location.href = "/login"
</script>
    @endif
@endsection