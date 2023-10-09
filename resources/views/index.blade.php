<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G Tools</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar{
            display: flax;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
            top: 0%;
            position: fixed;
            padding: 10px 20px;
        }
        .login-register{
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            padding-right: 29.4px;
        }
        .container {
            padding: 50px;
            text-align: center;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 40px;
        }
        .cta-button {
            background-color: #fff;
            color: #000;
            padding: 12px 24px;
            font-size: 18px;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .cta-button:hover {
            background-color: #000;
            color: #fff;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .section {
            padding: 6.9px 0;
            text-align: center;
        }
        .section h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }
        .feature {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
        .feature-icon {
            font-size: 36px;
            color: #FFD700;
            margin-right: 20px;
        }
        .feature-text {
            font-size: 18px;
            text-align: left;
            max-width: 600px;
        }
        .testimonial {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }
        .testimonial-text {
            font-size: 18px;
            margin-bottom: 10px;
            max-width: 600px;
        }
        .testimonial-author {
            font-size: 14px;
            color: #FFD700;
        }
        .tool {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }
        .tool-image {
            max-width: 19%;
            border-radius: 10px;
        }
        .tool-description {
            text-align: left;
            margin-left: 20px;
        }
        .subscription-form {
            max-width: 400px;
            margin: 0 auto;
        }
        .input-field {
            width: 92.9%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: transparent;
            color: #fff;
        }
        .submit-button {
            background-color: #FFD700;
            color: #000;
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .submit-button:hover {
            background-color: #000;
            color: #fff;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 36px;
            }
            p {
                font-size: 16px;
            }
            .cta-button {
                font-size: 14px;
                padding: 10px 20px;
            }
            .feature-text, .testimonial-text, .tool-description {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    @error('email')
                    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
                @enderror

    @if (isset($EmailExists))
         <center><span style="font-size: 19.5px; color: red;">{{$EmailExists}}</span></center>
    @endif
    <div class="navbar">
        <div class="login-register">
            <button class="cta-button"><a href="{{url('')}}/login">Login</a></button>
            <button class="cta-button"><a href="{{url('')}}/register">Register</a></button>
        </div>
    </div>
    <div class="container">
        <br>
        <h1>Welcome to G Tools!</h1>
        <p>Unlock the power of our diverse suite of online tools tailored for your needs.</p>
        <button class="cta-button"><a href="{{url('')}}/tools">Explore Now</a></button>
    </div>
    
    <section class="section features">
        <div class="container">
            <h2>Explore a Variety of Tools</h2>
            <div class="feature">
                <div class="feature-icon">&#10004;</div>
                <div class="feature-text">Discover a comprehensive collection of online tools, ranging from mathematical utilities and matrix calculators to powerful statistics tools.</div>
            </div>
            <div class="feature">
                <div class="feature-icon">&#10004;</div>
                <div class="feature-text">Simplify complex mathematical tasks with our user-friendly interfaces and advanced algorithms.</div>
            </div>
            <div class="feature">
                <div class="feature-icon">&#10004;</div>
                <div class="feature-text">Ensure the security of your messages with our Message Encryption tool and generate strong passwords with our Password Generator.</div>
            </div>
            <div class="feature">
                <div class="feature-icon">&#10004;</div>
                <div class="feature-text">Track your fitness journey with our Fitness Tools, and explore additional utilities like IP detection and more.</div>
            </div>
        </div>
    </section>
    
    <section class="section testimonials">
        <div class="container">
            <h2>What Our Users Say</h2>
            <div class="testimonial">
                <p class="testimonial-text">"G Tools has revolutionized the way I approach mathematical challenges. The matrix calculator is a lifesaver!"</p>
                <p class="testimonial-author">- User1</p>
            </div>
            <div class="testimonial">
                <p class="testimonial-text">"The statistics tools provided by G Tools have enhanced my research and analysis capabilities. Highly recommended!"</p>
                <p class="testimonial-author">-User2</p>
            </div>
        </div>
    </section>
    
    <section class="section showcase">
        <div class="container">
            <h2>Tool Showcase</h2>
            <div class="tool">
                <img class="tool-image" src="{{asset('MathTools.png')}}" alt="Math Tools">
                <div class="tool-description">
                    <h3>Math Tools</h3>
                    <p>Explore the capabilities of our Math Tools, designed to simplify complex mathematical calculations and provide valuable insights.</p>
                </div>
            </div>
            <div class="tool">
                <img class="tool-image" src="{{asset('MessageEncryption.png')}}" alt="Message Encryption">
                <div class="tool-description">
                    <h3>Message Encryption</h3>
                    <p>Secure your confidential messages using our Message Encryption tool, ensuring your privacy and data protection.</p>
                </div>
            </div>

            <div class="tool">
                <div class="tool-description">
                    <p style="font-size: 19.9px;">& More</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section subscription">
        <div class="container">
            <h2>Stay Informed</h2>
            <div class="subscription-form">
                <p>Subscribe to our newsletter to receive updates about new tools, features, and tips to make the most of G Tools.</p>
                <form action="{{url('')}}/Subscribe" method="POST">
                    @csrf
                <input type="email" class="input-field" placeholder="Your Email" name="email" required>
                <input type="submit" value="Subscribe" class="submit-button">
                </form>
            </div>
        </div>
    </section>
@if (isset($Confirmation))
<script>
    function speak(let message){
            if ('speechSynthesis' in window) {

  // Create a new instance of the SpeechSynthesisUtterance object

  var message = new SpeechSynthesisUtterance();

  // Set the text to be spoken
  message.text='Thank you for subscribing us.';

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
@endif
</body>
</html>