@extends('Layout.hmain')

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
@if($Email)
<main>
    <center>
    <h4><a href="{{url('')}}/Admin/Dashboard" class="Tools">Home</a></h4>
    <h4><a href="{{url('')}}/Admin/remove" class="Tools">Remove Users</a></h4>
    </center>
  @else
<script>
window.location.href="/login";
</script>
</main>
@endif
@endsection