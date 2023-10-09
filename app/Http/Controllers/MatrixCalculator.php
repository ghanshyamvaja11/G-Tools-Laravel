<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixCalculator extends Controller
{
      public function processMatrixAddition(Request $request)
    {
        $request->validate([
            'rows' => 'required|numeric',
            'columns' => 'required|numeric',
            'rows2' => 'required|numeric',
            'columns2' => 'required|numeric',
            'matrix' => 'required',
            'matrix2' => 'required'
        ]);

        $rows = $request->input('rows');
        $columns = $request->input('columns');
        $rows2 = $request->input('rows2');
        $columns2 = $request->input('columns2');
        $matrixData = $request->input('matrix');
        $matrixData2 = $request->input('matrix2');

        // Create the matrix from the input data
        $matrix = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = $matrixData[$i][$j];
            }
        }

         $matrix2 = [];
        for ($i = 0; $i < $rows2; $i++) {
            for ($j = 0; $j < $columns2; $j++) {
                $matrix2[$i][$j] = $matrixData2[$i][$j];
            }
        }
        // Perform matrix operations
        $resultAddition = $this->addition($matrix, $matrix2);

        return view('MatrixCalculator.Addition', compact('matrix','matrix2', 'resultAddition'));
    }

      public function processMatrixSubstraction(Request $request)
    {
         $request->validate([
            'rows' => 'required|numeric',
            'columns' => 'required|numeric',
            'rows2' => 'required|numeric',
            'columns2' => 'required|numeric',
            'matrix' => 'required',
            'matrix2' => 'required'
        ]);

        $rows = $request->input('rows');
        $columns = $request->input('columns');
        $rows2 = $request->input('rows2');
        $columns2 = $request->input('columns2');
        $matrixData = $request->input('matrix');
        $matrixData2 = $request->input('matrix2');

        // Create the matrix from the input data
        $matrix = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = $matrixData[$i][$j];
            }
        }

         $matrix2 = [];
        for ($i = 0; $i < $rows2; $i++) {
            for ($j = 0; $j < $columns2; $j++) {
                $matrix2[$i][$j] = $matrixData2[$i][$j];
            }
        }
        // Perform matrix operations
        $resultSubtraction = $this->subtraction($matrix, $matrix2);

        return view('MatrixCalculator.Substraction', compact('matrix','matrix2', 'resultSubtraction'));
    }

      public function processMatrixMultiplication(Request $request)
    {
         $request->validate([
            'rows' => 'required|numeric',
            'columns' => 'required|numeric',
            'rows2' => 'required|numeric',
            'columns2' => 'required|numeric',
            'matrix' => 'required',
            'matrix2' => 'required'
        ]);

        $rows = $request->input('rows');
        $columns = $request->input('columns');
        $rows2 = $request->input('rows2');
        $columns2 = $request->input('columns2');
        $matrixData = $request->input('matrix');
        $matrixData2 = $request->input('matrix2');

        // Create the matrix from the input data
        $matrix = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = $matrixData[$i][$j];
            }
        }

         $matrix2 = [];
        for ($i = 0; $i < $rows2; $i++) {
            for ($j = 0; $j < $columns2; $j++) {
                $matrix2[$i][$j] = $matrixData2[$i][$j];
            }
        }
        // Perform matrix operations
        $resultMultiplication = $this->multiplication($matrix, $matrix2);

        return view('MatrixCalculator.Multiplication', compact('matrix','matrix2', 'resultMultiplication'));
    }

      public function processMatrixTranspose(Request $request)
    {
        $request->validate([
            'rows' => 'required|numeric',
            'columns' => 'required|numeric',
            'matrix' => 'required',
        ]);

        $rows = $request->input('rows');
        $columns = $request->input('columns');
        $matrixData = $request->input('matrix');

        // Create the matrix from the input data
        $matrix = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = $matrixData[$i][$j];
            }
        }

        $resultTransposition = $this->transpose($matrix);

        return view('MatrixCalculator.Transpose', compact('matrix', 'resultTransposition'));
    }

    private function addition($matrix1, $matrix2)
    {
        $result = [];
        $rows = count($matrix1);
        $columns = count($matrix1[0]);

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
            }
        }
        return $result;
    }

    private function subtraction($matrix1, $matrix2)
    {
        $result = [];
        $rows = count($matrix1);
        $columns = count($matrix1[0]);

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $result[$i][$j] = $matrix1[$i][$j] - $matrix2[$i][$j];
            }
        }

        return $result;
    }

    private function multiplication($matrix1, $matrix2)
    {
        $result = [];
        $rowsA = count($matrix1);
        $columnsA = count($matrix1[0]);
        $rowsB = count($matrix2);
        $columnsB = count($matrix2[0]);

        if ($columnsA !== $rowsB) {
            throw new \Exception('Matrix dimensions are not compatible for multiplication.');
        }

        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $columnsB; $j++) {
                $sum = 0;
                for ($k = 0; $k < $columnsA; $k++) {
                    $sum += $matrix1[$i][$k] * $matrix2[$k][$j];
                }
                $result[$i][$j] = $sum;
            }
        }

        return $result;
    }

    private function transpose($matrix)
    {
        $result = [];
        $rows = count($matrix);
        $columns = count($matrix[0]);

        for ($i = 0; $i < $columns; $i++) {
            for ($j = 0; $j < $rows; $j++) {
                $result[$i][$j] = $matrix[$j][$i];
            }
        }

        return $result;
    }

public function scalarMultiplication(Request $request)
    {
        $request->validate([
            'rows' => 'required|numeric',
            'columns' => 'required|numeric',
            'matrix' => 'required',
            'scalar' => 'required|numeric'
        ]);

        $rows = $request->input('rows');
        $columns = $request->input('columns');
        $matrixData = $request->input('matrix');
        $Scalar = $request->input('scalar');

        // Create the matrix from the input data
        $matrix = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = $matrixData[$i][$j];
            }
        }

        // Perform scalar multiplication
        $scalarMatrix = [];
        foreach ($matrix as $row) {
            $resultRow = [];
            foreach ($row as $value) {
                $resultRow[] = $value * $Scalar;
            }
            $scalarMatrix[] = $resultRow;
        }

        return view('MatrixCalculator.ScalarMultiplication', compact('matrix', 'Scalar', 'scalarMatrix'));
    }

    //Determinant
    public function Determinant(Request $request)
    {

        $request->validate([
            'rows' => 'required|numeric',
            'matrix' => 'required'
        ]);

        $matrix = $request->input('matrix');
        $size = $request->input('rows');

        // Validate matrix dimensions
        foreach ($matrix as $row) {
            if (count($row) != $size) {
                return back()->withErrors(['matrix' => 'Invalid matrix dimensions.'])->withInput();
            }
        }

        // Calculate determinant using Laplace expansion
        $determinant = $this->calculateDeterminantRecursive($matrix, $size);

        return view('MatrixCalculator.Determinant')->with(compact('matrix', 'determinant'));
    }

    private function calculateDeterminantRecursive($matrix, $size)
    {
        if ($size == 1) {
            return $matrix[0][0];
        }

        $determinant = 0;
        for ($i = 0; $i < $size; $i++) {
            $submatrix = [];
            for ($j = 1; $j < $size; $j++) {
                $row = [];
                for ($k = 0; $k < $size; $k++) {
                    if ($k != $i) {
                        $row[] = $matrix[$j][$k];
                    }
                }
                $submatrix[] = $row;
            }
            $determinant += $matrix[0][$i] * pow(-1, $i) * $this->calculateDeterminantRecursive($submatrix, $size - 1);
        }

        return $determinant;
    }
}