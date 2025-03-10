@extends('Layout.main')

@push('title')
    <title>G Tools - Random Number generator</title>
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

    #Submit{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Submit:hover{
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
    <center><h2 style=" color: LightGreen; font-size: 128%;">Random Password Generator</h2>
    <hr></center>
<section>
    <br>
    <br>
        <div id="sec">
        <center>
            <form action="{{url('')}}/RandomPassword" method="POST">
    @csrf
    <input type="Number" name="Length" PlaceHolder="Enter Length for Password Ex. 15*" style='height: 29px; width: 284px; font: 29px; ' required><p>
        @error('Length')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
    <select name="Combination" style='height: 29px; width: 284px; font: 29px;' required>
        <option value="" selected>Select Combination</option>
        <option value="Digits">Digits</option>
        <option value="Alphabets">Alphabets</option>
        <option value="Special Characters">Special Characters</option>
        <option value="Digits + Alphabets">Digits + Alphabets</option>
        <option value="Digits + Special Characters">Digits + Special Characters</option>
        <option value="Alphabets + Special Characters">Alphbets + Special Characters</option>
        <option value="Digits + Alphabets + Special Characters">Digits + Alphabets + Special Characters</option>
    </select>
    <p>
    @error('Combination')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
    <input type="Submit" value="Generate Password" id="Submit" name="Submit">
    </form>
        </center>
        </div>
    </section>
    <br>
    <br>

    @if (isset($GeneratedPassword) && isset($PasswordLength))

    <center><h2 style='color: LightBlue; display: inline; text-align: center;'>Generated Password</h2><p><h2 style="color: white; font-size: 99%; text-align: center;"> {{$GeneratedPassword}} </h2>

        <br><h4 style='color: RGB(235, 136, 23); display: inline;'>PASSWORD Level : </h4>

    @if($PasswordLength >= 15)
        <h4 style='color: RGB(138, 245, 66); display: inline;'>Excellent</h4>
    @elseif($PasswordLength >= 10)
        <h4 style='color: Yellow; display: inline;'>Medium</h4>
    @else
        <h4 style='color: Red; display: inline;'>Weak</h4>
    @endif

    @endif
    @if ($Email)

      @else
<script>
window.location.href="/login";
</script>
@endif
    </main>
@endsection