@extends('Layout.main')
@push('title')
  <title>G Tools - Contact US</title>
@endpush
@section('Content_Information')
<head>
    <script>
    // Get the button element by its ID
var button = document.getElementById('Speech');

// Assign the event listener to the button
button.addEventListener('click', Speech);

function Speech(){
        if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text="Hello and thank you for visiting my website! As the only developer behind this site, I am committed to ensuring that you have the best possible experience. If you have any questions, comments, or concerns, please don't hesitate to get in touch with me using the contact form below. Alternatively, you can send an email to ghanshyamvaja11@gmail.com and I will get back to you as soon as possible. Thank you again for your interest in my website, and I look forward to hearing from you soon!";

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
        <br>
        @if (isset($EmailExists))
          <center><span style="font-size: 15.9px; color: red;">{{$EmailExists}}</span></center>
        @endif
        <center><button style="color: black; background: white; font-size: 29px; border: 2px solid green; border-radius: 6.9px; cursor: pointer;" onClick="Speech()" id="Speech">Click Here To Listen</button></center>
<p style="color: white;">
    Hello and thank you for visiting my website! As the only developer behind this site, I am committed to ensuring that you have the best possible experience. If you have any questions, comments, or concerns, please don't hesitate to get in touch with me using the contact form below.
    
    <div class="container">
  <form id="ContactUs" action="{{url('/')}}/contactus/submit" method="post">
    @csrf
    <fieldset>
      <legend>Contact Us</legend>
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Your name" required>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Your email" required>
      <label for="message">Message</label>
      <textarea id="message" name="message" placeholder="Your message" required></textarea>
      <button type="submit" name="submit">Send Message</button>
    </fieldset>
  </form>
</div>

<style>
.container {
  max-width: 600px;
  margin: 0 auto;
}

#ContactUs {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
}

fieldset {
  border: none;
  text-align: center;
}

legend {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  resize: none;
}

button[type="submit"] {
  background-color: white;
  color: black;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#Speech:hover{
  color: black;
  background-color: white;
}

@media screen and (max-width: 480px) {
  input[type="text"],
  input[type="email"],
  textarea,
  button[type="submit"] {
    width: 100%;
  }
}
</style>

@if (isset($success))
  <script>
 
// Check if speech synthesis is supported
function speak(){
if ('speechSynthesis' in window) {
  // Get the speech synthesis object
  const synth = window.speechSynthesis;
  let name = document.getElementById("name").value;
  
    // Speak the text in the text input element
    synth.speak(new SpeechSynthesisUtterance("Thank you "+ name + " for contacting us! We appreciate your interest and will get back to you as soon as possible."));
}else{
    console.log("Thank you for contacting us! We appreciate your interest and will get back to you as soon as possible.")
}
}
speak();
window.history.back();
  </script>
      @endif
<p style="color: white;">
Alternatively, you can send an email to <span style="color: yellow; font-size: 15.9px; font-weight: bold;">ghanshyamvaja11@gmail.com</span> <span> and I will get back to you as soon as possible.<span>
</p>
    
<p style="color: white;">
Thank you again for your interest in my website, and I look forward to hearing from you soon!
<p>
@endsection