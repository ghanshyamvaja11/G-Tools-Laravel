<?php

 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncodeDecode;
use Illuminate\Support\Facades\DB;

class EncodeDecode_controller extends Controller
{
     public function index(){
         $encode = null;
         $decode = null;

         $Answer = compact('encode', 'decode');
           return view('EncodeAndDecode')->with($Answer);
   }
   
 public function Encode(Request $request){
         $Encode = new EncodeDecode;
             $Encode->message = $request->message;
         $Encode->KeyValue =  $request->key;
         $Encode->HashValue = sha1($request->message);
         $Encode->views_no = $request->views;
         $Encode->ViewsCount = 0;
         $Encode->updated_at = time();
         $Encode->created_at = time();

         if($Encode->save()){
             $HashValue = sha1($request->message);
             $KeyValue = $request->key;
             $encode = 1;
             $success = "success";

             $Answer = compact('success', 'encode', 'HashValue', 'KeyValue');
             return view('EncodeAndDecode')->with($Answer);
         }
     }

     public function Decode(Request $request){
         $HashValue = $request->HashValue;
         $key = $request->key;
         $recordNotfound = false;
         $Views = 0;
         $ViewsCount = 0;
         $message = null;
         $decode = 1;

         $HashCheck = EncodeDecode::where('HashValue', $request->HashValue)->first();
         $KeyCheck = EncodeDecode::where('KeyValue', $request->Key)->first();

         if(!is_null($HashCheck) && !is_null($KeyCheck)){
             $Store = EncodeDecode::where('HashValue', $request->HashValue)->first();
             $Views = $Store->views_no;
             $ViewsCount = $Store->ViewsCount;

              if($Views ==  $ViewsCount){
                 $Store->delete();
                 return view('EncodeAndDecode')->with('message', '');
             }
              else{
                 $Store = EncodeDecode::where('HashValue', $HashValue)->first();
                 $Store->ViewsCount = $ViewsCount+1;
                  $Store = EncodeDecode::where('HashValue', $HashValue)->update(['ViewsCount' => ($ViewsCount+1)]);
                
 $message = $HashCheck->message;
                  $Answer = compact('message', 'decode');
                 return view('EncodeAndDecode')->with($Answer);
             }
         }
         else{
             $aCount = '';
             $Answer = compact('decode', 'aCount');
             return view('EncodeAndDecode')->with($Answer);
         }
     }
 }