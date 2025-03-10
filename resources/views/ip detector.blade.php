@extends('Layout.main')

@push('title')
<title>G Tools - ip detector</title>
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

    #Refresh{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Refresh:hover{
        color: white;
        font-size: 19px;
        background-color: black;
        border: 2px solid green;
        border-radius: 29px;
    }
textarea {
  resize: none;
}
h1 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    p {
      margin-bottom: 1rem;
    }
    /* Desktop styles */
    @media (min-width: 768px) {
      .container {
        max-width: 768px;
        margin: 0 auto;
      }
    }
    p{
        color: white;
    }
    #ipv4-address{
        color: yellow;
    }
    #ipv6-address{
        color: yellow;
    }
</style>

<main>
  @if ($Email)
    <center><h2 style=" color: LightGreen; font-size: 128%;">IP Detector</h2>
    <hr></center>
<section>
    <br>
    <br>
        <div id="sec">
        <center>
    <p>Your IPv4 address is:</p>
    <p id="ipv4-address">Loading...</p>
    <Button id="Refresh" onclick="getIpAddress()">Refresh</Button>
        </center>
        </div>
    </section>
    <br>
<script>
function getIpAddress() {
      var ipv4AddressElement = document.getElementById('ipv4-address');
      ipv4AddressElement.innerHTML = 'Loading...';

      fetch('https://ipapi.co/json/')
        .then(response => response.json())
        .then(data => {
          ipv4AddressElement.innerHTML = data.ip;
        })
        .catch(error => {
          ipv4AddressElement.innerHTML = 'Error: ' + error;
        });
    }

    // Get IP addresses on page load
    getIpAddress();
</script>
  @else
<script>
window.location.href="/login";
</script>
@endif
@endsection