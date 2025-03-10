@extends('Layout.main')

@push('title')
<title>G Tools - Statistics Calculator</title>
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

    #Statistics{
        color: black;
        font-size: 19px;
        background-color: white;
        border-radius: 29px;
        cursor: pointer;
    }
    #Statistics:hover{
        color: white;
        font-size: 19px;
        background-color: black;
        border: 2px solid green;
        border-radius: 29px;
    }
   #Calculate:hover{
        color: black;
    }
#stats-table {
        margin-top: 20px;
        border-collapse: collapse;
      }
      #stats-table td, #stats-table th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      #stats-table th {
        background-color: #f2f2f2;
      }
      td{
          color: white;
      }
      .Answer{
          color: yellow;
      }
textarea {
  resize: none;
}
</style>

<main>
  @if ($Email)
    <center><h2 style=" color: LightGreen; font-size: 128%;">Statistics Calculator</h2>
    <hr></center>
<section>
    <br>
    <br>
        <div id="sec">
        <center>
            <form method="GET">
    <textarea rows="5" inputmode="decimal" cols="42" id="numbers" pattern="[0-9]*[.,]?[0-9]*" placeholder="Enter Dataset Ex. 2, 4, 6, 8, 9" required></textarea>
    <p>
    <button id="Statistics" name="Statistics" onclick="calculateStatistics()"><a href="
 #stats-table" style="color: green; text-decoration: none;" id="Calculate">Calculate</a></button>
 </form>
        </center>
        </div>
    </section>
    <br>
    <center>
    <h2 id="Results" style="color: lightblue;"></h2>
    
    <div id="Array" style="visibility: hidden;">
        <h2 style="color: white;">
            Sorted Dataset
</h2>
    <textarea id="SortedArray" rows="5" cols="42"  readonly></textarea>
</div>

       <table id="stats-table">
      <tr>
    </table>
    
    <script>
      function calculateStatistics() {
          document.getElementById('Results').innerHTML="Results";
          document.getElementById('SortedArray').innerHTML = null;
          document.getElementById('Array').style.visibility = "visible";
          
  let numbers = document.getElementById("numbers").value;
  
 const numbersArray = numbers.split(",").map(x => x.trim() === "" ? null : Number(x)).filter(x => x !== null);

  const n = numbersArray.length;
  const sortedArray = numbersArray.sort((a, b) => a - b);
  document.getElementById('SortedArray').innerHTML = sortedArray;
  
  const sum = numbersArray.reduce((acc, cur) => acc + cur, 0);
  const mean = sum / n;
  const median = n % 2 === 0 ? (sortedArray[n / 2] + sortedArray[n / 2 - 1]) / 2 : sortedArray[Math.floor(n / 2)];
  let mode = null;
  let modeCount = 0;
  let counts = {};
  for (let i = 0; i < n; i++) {
    const num = sortedArray[i];
    counts[num] = (counts[num] || 0) + 1;
    if (counts[num] > modeCount) {
      mode = num;
      modeCount = counts[num];
    }
  }
  const variance = numbersArray.reduce((acc, cur) => acc + Math.pow(cur - mean, 2), 0) / (n - 1);
  const stdDev = Math.sqrt(variance);
  
  //const mean = numbersArray.reduce((a, b) => a + b) / numbersArray.length;

const PopulationVar = numbersArray.reduce((a, b) => a + Math.pow(b - mean, 2), 0) / numbersArray.length;

const PopulationStdDev = Math.sqrt(variance);

  const range = sortedArray[n - 1] - sortedArray[0];
  const min = sortedArray[0];
  const max = sortedArray[n - 1];

  const countDecimal = (num) => {
    if (Math.floor(num) !== num) {
      return num.toString().split(".")[1].length || 0;
    }
    return 0;
  }

  const results = [
    { name: "Count", value: n },
    { name: "Sum", value: sum },
    { name: "Mean", value: mean },
    { name: "Median", value: median },
    { name: "Mode", value: mode },
    { name: "Sample Standard Deviation", value: stdDev },
    { name: "Sample Variance", value: variance },
    { name: "Population Standerd Deviation", value: PopulationStdDev },
    { name: "Population Variance", value: PopulationVar },
    { name: "Range", value: range },
    { name: "Minimum", value: min },
    { name: "Maximum", value: max },
  ];

  let tableHtml = "<tr><th>Statistic</th><th>Value</th></tr>";
  for (let i = 0; i < results.length; i++) {
    const value = results[i].value;
    const isDecimal = countDecimal(value) > 0;
    tableHtml += `<tr><td>${results[i].name}</td><td style='color: yellow;'>${isDecimal ? value.toFixed(2) : value}</td></tr>`;
}

for (let i = 0; i < results.length; i++) {
    let value = results[i].value;
    const isDecimal = countDecimal(value) > 0;
        if ('speechSynthesis' in window) {
            value =     isDecimal ? value.toFixed(2) : value;
            let message = new SpeechSynthesisUtterance();
message.text = results[i].name + " is " + value;

speechSynthesis.speak(message);
}

}
  document.getElementById("stats-table").innerHTML = tableHtml;
}
</script>
</center>
  @else
<script>
window.location.href="/login";
</script>
@endif
@endsection
