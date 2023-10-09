@extends('Layout.main')

@push('title')
<title>G Tools - Register</title>
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

    #Register{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Register:hover{
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
    <center><h2 style=" color: LightGreen; font-size: 128%;">Register</h2>
    <hr></center>
        @if (isset($EmailExists))
          <center><span style="font-size: 15.9px; color: red;">{{$EmailExists}}</span></center>
        @endif
<section>
    <br>
    <br>
        <div id="sec">
        <center>
            <form action="{{url('/')}}/Register" method="POST">
                @csrf
    <input type="text" name="Name" 
    PlaceHolder="Enter your Name " style="height: 42px; width: 168px; font: 29px;" required>
<br>
@error('Name')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
<br>
    <input type="email" name="Email" 
    PlaceHolder="Enter your Email " style="height: 42px; width: 168px; font: 29px;" required>
<br>
@error('Email')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
<br>
<label for="DOB" style=" font-size: 11.9px; color: white;">Date of Birth : </label><input type="date" name="DOB" 
    PlaceHolder="" style="height: 42px; width: 96.4px; font: 29px;" required>
<br>
@error('DOB')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
<br>
<input type="Password" name="Password" 
    PlaceHolder="Enter Password" style="height: 42px; width: 168px; font: 29px;" required>
    <br>
    @error('Password')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
<br>
    <p>
    
    <p>
    <input type="Submit" value="Register" id="Register" name="Register">
    </form>
        </center>
        </div>
    </section>
@if (isset($success))
@php
$message = "Hi ".$Name."\n"."Thank you for registering yourself on Gtools360."
    // mail($Email, 'Registraction Confirmation at GTools360', $message);
@endphp

<script>
function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Thank you" + <?php echo json_encode($Name); ?> + "for registering yourself on Gtools360";

  // Set the voice to be used (optional)
  var voices = window.speechSynthesis.getVoices();
  
// Find a male voice
  var maleVoice = voices.find(function(voice) {
    return voice.name.includes('Male');
  });

  // Set the male voice (if found), otherwise use the first available voice
  message.voice = maleVoice || voices[0];


  // Set other options (optional)
  message.volume = 1; // Range from 0 to 1
  message.rate = 1; // Range from 0.1 to 10
  message.pitch = 1; // Range from 0 to 2

  // Speak the text
  window.speechSynthesis.speak(message);
} else {
  console.log('Speech synthesis not supported');
}
// window.location.href = "http://gtools360.000webhostapp.com/login";
}
Speech();
    </script>
@endif
@endsection