@extends('Layout.main')

@section('Content_Information')
@push('title')
<title>G Tools</title>
@endpush
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

.category {
    color: White;
    font-size: 100%;
}

.Tools {
    text-decoration: none;
    color: yellow;
    background: black;
    border: 2px solid green;
    padding: 6px;
    border-radius: 29%;
    cursor: pointer;
}

.Tools:hover{
    color: black;
    background: yellow;
    border-radius: 69%;
}
</style>

<main>
    <center>
    <h2 class="category">Math Tools</h2>
    <h4><a href="{{url('')}}/MathTools/RandomNumberGenerator" class="Tools">Random Number Generator</a></h4>
    <h4><a href="{{url('')}}/MathTools/Percentage" class="Tools">Percentage Calculator</a></h4>
    <h4><a href="{{url('')}}/MathTools/Exponent" class="Tools">Exponent Calculator</a></h4>
    <hr>
    <h2 class="category">Matrix Calculator</h2>
    <h4><a href="{{url('')}}/MatrixCalculator/Addition" class="Tools">Addition</a></h4>
    <h4><a href="{{url('')}}/MatrixCalculator/Substraction" class="Tools">Substraction</a></h4>
    <h4><a href="{{url('')}}/MatrixCalculator/Multiplication" class="Tools">Multiplication</a></h4>
    <h4><a href="{{url('')}}/MatrixCalculator/Transpose" class="Tools">Transpose</a></h4>
    <h4><a href="{{url('')}}/MatrixCalculator/ScalarMultiplication" class="Tools">Scalar Multiplication</a></h4>
    <h4><a href="{{url('')}}/MatrixCalculator/Determinant" class="Tools">Determinant</a></h4>
    <hr>
    <h2 class="category">Set Theory Calculator</h2>
    <h4><a href="{{url('')}}/Set" class="Tools">Set Theory</a></h4>
    <hr>
    <h2 class="category">Statistics Tools</h2>
    <h4><a href="{{url('')}}/Statistics" class="Tools">Statistics Calculator</a></h4>
    <hr>
    <h2 class="category">Message Encoding and Decoding Tools</h2><h4><a href="{{url('')}}/EncodeDecode" class="Tools">Encode and Decode Message</a></h4>
    {{-- <hr>
    <h2 class="category">Password Generator Tool</h2><h4><a href="{{url('')}}/RandomPassword" class="Tools">Random Password Generator</a></h4> --}}
    <hr>
    <h2 class="category">IP Tools</h2><h4><a href="{{url('')}}/ipdetector" class="Tools">IP Detector</a></h4>
    <hr>
    <h2 class="category">Fitness Calculator Tools</h2><h4><a href="{{url('')}}/BMI" class="Tools">Body Mass index Calculator</a></h4>
    </center>
</main>
@endsection