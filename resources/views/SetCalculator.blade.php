@extends('Layout.main')

@push('title')
<title>G Tools - Set Operations Calculator</title>
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
        <h2 style="color: LightGreen; font-size: 128%;">Set Theory</h2>
        <hr>
    </center>
    <section>
        <br>
        <br>
        <div id="sec">
            <center>
                <form method="POST" action="{{url('')}}/Set">
                    @csrf
                    <textarea rows="5" cols="42" id="setA" inputmode="decimal" name="setA" placeholder="Enter Set A Ex. 2, 4, 6, 8, 9"  pattern="[0-9]*[.,]?[0-9]*" required></textarea><br>
                    <textarea rows="5" cols="42" id="setB" inputmode="decimal" name="setB" placeholder="Enter Set B Ex. 3, 6, 9, 12, 15"  pattern="[0-9]*[.,]?[0-9]*" required></textarea><br><br>
                    <select name="operation" id="operation" style="height: 29px; width: 288px;" required>
                        <option value="">Select Operation</option>
                        <option value="union">Union</option>
                        <option value="intersection">Intersection</option>
                        <option value="difference">Difference</option>
                        <option value="complement">Complement</option>
                    </select><br><br>
                    <input type="submit" value="Calculate" id="Set">
                </form>
            </center>
        </div>
    </section>
    @if (isset($result))
        {{$lastElement = end($result)}}
    <center>
            <h1 style="color: white;">Result({{$operation}}):</h1>
    <span style=" color: white; font-size: 19.9px;">{ </span>
        @foreach ($result as $item)
        @if ($lastElement != $item)
            <span style=" color: white; font-size: 19.9px;">{{$item}}, </span>
        @else
        <span style=" color: white; font-size: 19.9px;">{{$item}}</span>
        @endif
        @endforeach
        <span style=" color: white; font-size: 19.9px;">} </span>
    @endif
    </center>
       @else
<script>
window.location.href="https://gtools360.000webhostapp.com/login";
</script>
</main>
@endif
@endsection