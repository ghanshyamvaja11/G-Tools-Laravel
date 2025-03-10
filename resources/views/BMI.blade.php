@extends('Layout.main')

@push('title')
<title>G Tools - BMI Calculator</title>
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

    #BMI{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #BMI:hover{
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
    <center><h2 style=" color: LightGreen; font-size: 128%;">BMI Calculator</h2>
    <hr></center>
<section>
    <br>
    <br>
        <div id="sec">
        <center>
            <form action="{{url('/')}}/BMI/Check" method="POST">
                @csrf
    <input type="text" name="H" 
    inputmode="decimal"
    PlaceHolder="Enter Height in feet Ex. 5.6 " style='height: 42px; width: 168px; font: 29px; ' pattern="[0-9]*[.,]?[0-9]*" required>
<br>
@error('H')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
<br>
<input type="text" name="W" 
    inputmode="decimal"
    PlaceHolder="Enter Weight in kg Ex. 59 " style='height: 42px; width: 168px; font: 29px; ' pattern="[0-9]*[.,]?[0-9]*" required>
    <br>
    @error('W')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
    <p>
    
    <p>
    <input type="Submit" value="Calculate" id="BMI" name="BMI">
    </form>
        </center>
        </div>
    </section>
    <br>
    <br>
    
@if(isset($BMI))
    
    <center><h2 style='color: LightBlue; display: inline; text-align: center;'>Result</h2><p> 

<h4 style="color: white;">Your Body Mass Index is <span style="color: yellow;">{{$BMI}}</span></h4>
@if ($BMI < 18.5)
            <h4 style = 'color: yellow;'>You are UnderWeight</h4>
    
        <script>
if ('speechSynthesis' in window) {
  // Get the speech synthesis object
  const synth = window.speechSynthesis;
  
    // Speak the text in the text input element
    synth.speak(new SpeechSynthesisUtterance("You are UnderWeight"));
}
</script>
       @elseif ($BMI >= 18.5 && $BMI < 25)
            <h4 style='color: lightgreen;'>You are Normal</h4>
        <script>
if ('speechSynthesis' in window) {
  // Get the speech synthesis object
  const synth = window.speechSynthesis;
  
    // Speak the text in the text input element
    synth.speak(new SpeechSynthesisUtterance("You are Normal"));
}
</script>
       @elseif($BMI >= 25 && $BMI < 30)
            <h4 style='color: Orange;'>You are OverWeight</h4>
    
        <script>
if ('speechSynthesis' in window) {
  // Get the speech synthesis object
  const synth = window.speechSynthesis;
  
    // Speak the text in the text input element
    synth.speak(new SpeechSynthesisUtterance("You are OverWeight"));
}
</script>
        @else
            <h4 style='color: red;'>You are Obese</h4>
        <script>
if ('speechSynthesis' in window) {
  // Get the speech synthesis object
  const synth = window.speechSynthesis;
  
    // Speak the text in the text input element
    synth.speak(new SpeechSynthesisUtterance("You are Obese"));
}
</script>
    @endif
    @endif
    @else
<script>
window.location.href="/login";
</script>
    @endif
@endsection