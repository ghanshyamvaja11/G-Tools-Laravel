@extends('Layout.main')

@push('title')
    <title>G Tools - Exponent Calculator</title>
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

    #Exponent{
        color: black;
        background: wheat;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Exponent:hover{
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
    <input type="text" name="Base" id="Base"
    inputmode="decimal"
    PlaceHolder="Enter Base " style='height: 29px; width: 100px; font: 29px; ' pattern="[0-9]*[.,]?[0-9]*" required><h4 style="color: white; font-size: 24px; display: inline;"> &nbsp; ^ </h4>
    &nbsp;
 
<input type="number" step="any" name="Power" id="Power"
    inputmode="decimal"
    PlaceHolder="Enter Power " style='height: 29px; width: 100px; font: 29px; ' required><p>
    
    <p>
    <button id="Exponent" onclick="calculateExponent()">Calculate</button>
        </center>
        </div>
    </section>
    <br>
    <br>
    
    <center>
    <h2 id="Result" style="color: skyblue;"></h2>
    <h4 id="Answer" style="color: white"></h4>
    </center>
<script>
function calculateExponent(){
let Base = document.getElementById("Base").value;
let Power = document.getElementById("Power").value;

let Exponent = Math.pow(Base, Power);
document.getElementById('Result').innerHTML = "Result";

document.getElementById('Answer').innerHTML = "<h4 style='color: white;'>" + "<span style='color: yellow;'>" + Base + "</span>" + " to the power of " + "<span style='color: yellow;'>" + Power + "</span>" + " is " + "<span style='color: lightgreen;'>" + Exponent + "</span>";

        if ('speechSynthesis' in window) {
            let message = new SpeechSynthesisUtterance();
message.text = Base + "to the power of " + Power + " is " + Exponent;

speechSynthesis.speak(message);
}

}
</script>
@else
<script>
    window.location.href = "/login"
</script>
    @endif
</main>

@endsection