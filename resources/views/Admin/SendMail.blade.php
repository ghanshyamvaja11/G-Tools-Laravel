@extends('Layout.hmain')

@push('title')
<title>G Tools - Send Mail</title>
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

    #Set{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Set:hover{
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
    <center>
        <h2 style="color: LightGreen; font-size: 128%;">Send Mail</h2>
        <hr>
    </center>
    <section>
        <br>
        <br>
        <div id="sec">
            <center>
                <form method="POST" action="{{url('')}}/Admin/sendmail">
                    @csrf
                    <textarea rows="2" cols="42" name="subject" placeholder="Type Subject" required></textarea><br><br>
                    <textarea rows="9" cols="42" name="message" placeholder="Type Message" required></textarea><br><br>
                    <input type="submit" value="Send to All" id="Set">
                </form>
            </center>
        </div>
    </section>
    </center>
       @else
<script>
window.location.href="/login";
</script>
</main>
@endif
@endsection