<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetCalculation extends Controller
{
    public function performSetOperation(Request $request)
    {
        $setA = explode(',', $request->input('setA'));
        $setB = explode(',', $request->input('setB'));

        $operation = $request->input('operation');

        switch ($operation) {
            case 'union':
                $result = array_unique(array_merge($setA, $setB));
                break;

            case 'intersection':
                $result = array_intersect($setA, $setB);
                break;

            case 'difference':
                $result = array_diff($setA, $setB);
                break;

            case 'complement':
                $result = array_diff($setA, $setB);
                break;

            case 'subset':
                $result = count(array_diff($setA, $setB)) === 0;
                break;

            case 'superset':
                $result = count(array_diff($setB, $setA)) === 0;
                break;

            default:
                $result = [];
                break;
        }

        return view('SetCalculator', ['result' => $result, 'operation' => $operation]);
    }
}
