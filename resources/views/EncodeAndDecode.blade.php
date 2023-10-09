@extends('Layout.main')
@push('title')
    <title>G Tools - Encode and Decode Message</title>
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

#sec h4{
        color: red;
        background-color: white;
        font-size: 59px;
    }
    #Encode{
        color: Green;
        font-size: 29px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Encode:hover{
        color: black;
        font-size: 29px;
        background-color: yellow;
        border: 2px solid green;
        border-radius: 29px;
        cursor: pointer;
    }
    #Decode{
        color: Red;
        font-size: 29px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
     #Decode:hover{
        color: black;
        background-color: yellow;
        font-size: 29px;
        border: 2px solid green;
        border-radius: 29px;
        cursor: pointer;
    }
</style>
<script>
    var a,b;
</script>
<main>
    @if ($Email)
    @if (!isset($message))
    <center><h2 style=" color: white; font-size: 128%;">Message <span style="color: lightgreen;">Encoder </span>And <span style="color: red;">Decoder</span></h2></center>
    <hr>
<section>
    <br>
        <div id="sec">
        <center>
            <form method="GET">
                @csrf
    <input type="Submit" value="Encode Message" id="Encode" name="Choice1">
    <p>
    <input type="Submit" value="Decode Message" id="Decode" name="Choice2">
    </form>
        </center>
        </div>
    </section>

    <section>
        <p>
        <center>
            @if(isset($_GET['Choice1']))
            
            <style>
                #sec{
                    display: none;
                }
            </style>
        <form action="{{url('')}}/Encode" method="post">
            @csrf
            @method('POST')
            <fieldset  style="background-color: black;">
            <center><legend><h2 style="display: inline; color: LightGreen;">Encode Message</h4></legend></center>
<center>
                <p>
            <textarea rows="6" cols="29" id="Message" placeholder="Enter Message *" name="message" required style="resize: none;"></textarea><p>
            <input type="text" name="key" id="Key" placeholder="Set Key *" required><p>
   <input type="Number" name="views" id="views" placeholder="Enter no. of peoples will see this message*" style="width: 290px;" required>
            </center><br>
            
            <center><input type="submit" name="Encode" value="Encode" id="Encode"></center>
            </fieldset>
        </form>
@endif
@endif

@if(isset($_GET['Choice2']))
<style>
    #sec
    {
        display: none;
    }
</style>
    <form action="{{url('')}}/Decode" method="post">
        @csrf
        @method('POST')
           <fieldset  style="background-color: black;">
            <center><legend><<h2 style="display: inline; color: Red;">Decode Message</h4></legend></center>
<center>
                
<p>
  <input type="Text" id="HashValue" name="HashValue" style="height: 19.9px; width: 295px;" placeholder="Enter HashValue*" required><p>
            <input type="text" name="Key" id="Key" placeholder="Enter Key *" required></center><br>
            <center><input type="submit" name="Decode" value="Decode" id="Decode"></center>
            </fieldset>
        </form>
@else
        
@endif

@if (isset($encode))
            @if(isset($success))
            <br>
            <hr>
            <h4 style='color: Yellow; font-size: 29px; display: inline;'>HashValue : </h4><br>
            <input type="Text" id="HashValue" Value="{{$HashValue}}" name="HashValue" style="font-size: 14.9px; height: 19.9px; width: 329px; text-align: center;" readonly><p>
            <h4 style='color: Yellow; font-size: 29px; display: inline;'>Key : </h4><br>
            <input type="Text" id="Key" Value="{{$KeyValue}}" name="Key" style="font-size: 14.9px; height: 19.9px; width: 329px; text-align: center;" readonly><p>
            <hr>
            <p>
             @else
                echo "<h4 style='color: White; font-size: 92%;'><span style='color: Red;'>Error : </span>Use Only Numbers, Alphabets and Special Characters in Key.</h4>";
           @endif

@endif

@if (isset($decode))

           @if (isset($message))
            <p>
                <center><h2 style='color: Red; display: inline; text-align: center;'>Decoded Message</h2><p>
                <textarea rows="6" cols="29" id="Message" name="Message" required style="resize: none;" readonly>{{$message}}
                </textarea><p>
            @endif
            
            @if (isset($aCount))
            <h4 style='color: White; font-size: 92%;'><span style='color: Red;'>Error : </span>HashValue and Key Combination Is Not Found.<h4>
                </center>
            @endif
<script>
    setTimeout(() => {
        window.location = '{{url('')}}/EncodeDecode';
    }, 9000);
</script>
@endif
      </section>
        @else
<script>
window.location.href="https://gtools360.000webhostapp.com/login";
</script>
@endif
@endsection