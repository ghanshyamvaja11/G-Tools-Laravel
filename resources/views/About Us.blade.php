@extends('Layout.main')
@push('title')
    <title>Ash Tools - About Us</title>
@endpush
@section('Content_Information')
<head>
  <style>
    button:hover{
      background-color: black;
      color: white;
    }
  </style>
        <script>
// Get the button element by its ID
var button = document.getElementById('Speech');

// Assign the event listener to the button
button.addEventListener('click', Speech);

    // Check if the browser supports the Web Speech API

    function Speech(){
        //button.textContent = "||";
if ('speechSynthesis' in window) {
  // Create a new instance of the SpeechSynthesisUtterance object
  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text = "Welcome to G Tools! My name is Ghanshyam Vaja, and I'm the sole developer behind this project. As a passionate web developer, I am always looking for ways to challenge myself and expand my knowledge in this field. I started this website as a personal project, with the goal of creating innovative and useful tools that could help people solve problems and improve their productivity. Over time, it has evolved into a website that offers a variety of tools for people to use and enjoy. As a single person who developed this website, I am proud of the time and effort I have invested in this project. I have spent countless hours designing, coding, testing, and refining every aspect of the website to ensure a high-quality user experience. I have utilized the latest web development technology laravel and best practices to create a fast, responsive, and user-friendly website. I have also incorporated feedback and suggestions from users to improve the functionality and usability of the tools. I am committed to maintaining and updating the website to ensure that it continues to meet the needs of its users. I welcome feedback and suggestions from users, as they help me improve and refine the website. Thank you for visiting my website, and I hope that the tools offered here will help you achieve your goals and make your life easier and more enjoyable.";

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
}
</script>
</head>
<main>
  @if ($Email)
    <br>
    <center><button style="color: black; background: white; font-size: 29px; border: 2px solid green; border-radius: 6.9px; cursor: pointer;" onClick="Speech()" id="Speech">Click Here To Listen</button></center>
    <p>
<p style="color: white;">
    Welcome to G Tools! My name is <span style="font-weight: bold;">Ghanshyam Vaja</span>, and I'm the sole developer behind this project. As a passionate web developer, I am always looking for ways to challenge myself and expand my knowledge in this field.
<p style="color: white;">
I started this website as a personal project, with the goal of creating innovative and useful tools that could help people solve problems and improve their productivity. Over time, it has evolved into a website that offers a variety of tools for people to use and enjoy.
<p style="color: white;">
As a single person who developed this website, I am proud of the time and effort I have invested in this project. I have spent countless hours designing, coding, testing, and refining every aspect of the website to ensure a high-quality user experience.
<p style="color: white;">
I have utilized the latest web development technology laravel and best practices to create a fast, responsive, and user-friendly website. I have also incorporated feedback and suggestions from users to improve the functionality and usability of the tools.
<p style="color: white;">
I am committed to maintaining and updating the website to ensure that it continues to meet the needs of its users. I welcome feedback and suggestions from users, as they help me improve and refine the website.
<p style="color: white;">
Thank you for visiting my website, and I hope that the tools offered here will help you achieve your goals and make your life easier and more enjoyable.
<p>

</main>
@else
<script>
window.location.href="/login";
</script>
    @endif
@endsection