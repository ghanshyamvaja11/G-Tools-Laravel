@extends('Layout.main')

@section('Content_Information')
<head>
    @stack('title')
    <title>G Tools - Matrix Calculator</title>
   <style>
        /* Basic reset and general styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Centering the form */
        .container {
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 69%;
        }

        h2{
            color: red;
            font-size: 19px;
        }

        form {
            width: 92%;
            text-align: center;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: hsl(0, 0%, 3%);
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
        /* Styles for labels and input fields */
        label {
            font-family: Arial, Helvetica, sans-serif;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }

        input[type="number"] {
            width: 51%;
            height: 29px;
            margin-bottom: 6.9px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        /* Styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .answer{
            width: 15%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 5px;
            color: white;
            /* border: 1px solid #ccc; */
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            form {
                padding: 10px;
            }

            input[type="number"] {
                font-size: 14px;
            }
        }
        input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield; /* Firefox */
}
    </style>
</head>
<body>
    <main>
        @if ($Email)
        <center><h2 style=" color: LightGreen; font-size: 128%;">Matrix Calculator</h2>
         <center><h2 style=" color: rgb(236, 242, 236); font-size: 101%;">Multiplication</h2>
   <div class="container">
        <form id="matrixForm" action="{{url('')}}/MatrixCalculator/Multiplication" method="POST">
            @csrf
            <h2>Matrix A</h2>
            <input type="number" name="rows" id="rows" placeholder="Enter number Of Rows" required>
<br>
@error('rows')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
            <input type="number" name="columns" id="columns" placeholder="Enter number of Columns" required>
            @error('columns')
            <br>
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror

            <h2>Matrix B</h2>
            <input type="number" name="rows2" id="rows2" placeholder="Enter number of Rows" required readonly>
<br>
@error('rows2')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
            <input type="number" name="columns2" id="columns2" placeholder="Enter number of Columns" required>          <br>
            @error('columns2')
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
            <div id="A"></div>
            <table id="matrixTable">
                <!-- JavaScript will populate rows and columns here -->
            </table>
            @error('matrix')
            <br>
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
            <br>
            <div id="B"></div>
            <table id="matrixTable2">
                <!-- JavaScript will populate rows and columns here -->
            </table>
@error('matrix2')
            <br>
    <center><span style="font-size: 15.9px; color: red;">{{$message}}</span></center>
@enderror
            <button type="submit" id="Submit" name="Submit">Calculate</button>
        </form>
    </div>

    <script>
        const form = document.getElementById('matrixForm');
        const rowsInput = document.getElementById('rows');
        const columnsInput = document.getElementById('columns');
        const rowsInput2 = document.getElementById('rows2');
        const columnsInput2 = document.getElementById('columns2');
        const matrixTable = document.getElementById('matrixTable');
         const matrixTable2 = document.getElementById('matrixTable2');

        // Function to generate the matrix input fields
        function generateMatrixInputsA(rows, columns) {
            let html = '';
            for (let i = 0; i < rows; i++) {
                html += '<tr>';
                for (let j = 0; j < columns; j++) {
                    html += `
                        <td>
                            <input type="number" step="any" name="matrix[${i}][${j}]" required>
                        </td>
                    `;
                }
                html += '</tr>';
            }

            matrixTable.innerHTML = html;
        }
        function generateMatrixInputsB(rows, columns) {
             let html2 = '';

            for (let i = 0; i < rows; i++) {
                html2 += '<tr>';
                for (let j = 0; j < columns; j++) {
                    html2 += `
                        <td>
                            <input type="number" step="any" name="matrix2[${i}][${j}]" required>
                        </td>
                    `;
                }
                html2 += '</tr>';
            }

            matrixTable2.innerHTML = html2;
        }

        // Event listener to update matrix input fields on row/column change
        rowsInput.addEventListener('input', function() {
            const rows = parseInt(this.value);
            const columns = parseInt(columnsInput.value);
            generateMatrixInputsA(rows, columns);
        });

        columnsInput.addEventListener('input', function() {
            const rows = parseInt(rowsInput.value);
            const columns = parseInt(this.value);
            rowsInput2.value=columnsInput.value;
            document.getElementById('A').innerHTML="<center><span style='font-size: 19px; color: yellow;'>Matrix A</span></center>";
            generateMatrixInputsA(rows, columns);
        });

        rowsInput2.addEventListener('input', function() {
            if(rowsInput2.value){
            const rows = rowsInput2.value;
            const columns = parseInt(columnsInput2.value);
            generateMatrixInputsB(rows, columns);
            }
        });
        columnsInput2.addEventListener('input', function() {
            const rows = parseInt(columnsInput.value);
            const columns = parseInt(columnsInput2.value);
            generateMatrixInputsB(rows, columns);
            document.getElementById('B').innerHTML="<center><span style='font-size: 19px; color: yellow;'>Matrix B</span></center>";
        });

        // Initial call to generate matrix inputs based on default values
        generateMatrixInputsA(parseInt(rowsInput.value), parseInt(columnsInput.value));
        generateMatrixInputsB(parseInt(rowsInput2.value), parseInt(columnsInput2.value));
    </script>
@isset($matrix)
 <div class="container">
        <h2>Matrix A</h2>
        @if (isset($matrix))
        <table class="answer">
            @foreach ($matrix as $row)
                 <tr>
                    @foreach ($row as $value)
                        <td style="padding: 2px;" align="center">{{$value}}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
         <h2>Matrix B</h2>
        <table class="answer">
            @foreach ($matrix2 as $row)
                <tr>
                    @foreach ($row as $value)
                        <td style="padding: 2px;" align="center">{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
            </table>
        <h2>Matrix Multiplication:</h2>
        <table class="answer">
            @foreach ($resultMultiplication as $row)
                <tr>
                    @foreach ($row as $value)
                        <td style="padding: 2px;" align="center">{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
    </main>
</body>
    @endif
    @endisset
    @else
<script>
window.location.href="/login";
</script>
    @endif
@endsection