<?php

use App\Models\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathTools;
use App\Http\Controllers\Contact_Us_Controller;
use App\Http\Controllers\EncodeDecode_controller;
use App\Http\Controllers\RandomPasswordGeneratorController;
use App\Http\Controllers\BMI_Controller;
use App\Http\Controllers\MatrixCalculator;
use App\Http\Controllers\SubscribeInsert;
use App\Http\Controllers\SetCalculation;
use App\Http\Controllers\Register_Login;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/tools', function(){
    return view('tools');
});

Route::get('/About_Us', function(){
    return view('About Us');
});

Route::get('/Contact_Us', function(){
    return view('Contact Us');
});

Route::get('/register', function(){
    return view('Register');
});
Route::post('/Register', [Register_Login::class, 'Register']);

Route::get('/login', function(){
    return view('Login');
});
Route::post('/Login', [Register_Login::class, 'Login']);

Route::get('/AdminLogin', function () {
    return view('AdminLogin');
});
Route::post('/AdminLogin', [Register_Login::class, 'AdminLogin']);

Route::get('/Admin/Dashboard', function () {
    return view('Admin.Dashboard');
});

Route::get('/Admin/remove', function () {
    $users = Users::all();
    return view('Admin.RemoveUsers', compact('users'));
});

Route::post('/Admin/remove/{email}', [Admin::class, 'RemoveUser']);

Route::get('/Admin/sendmail', function () {
    return view('Admin.SendMail');
});

Route::post('/Admin/sendmail', [Admin::class, 'SendEmail']);

Route::get('/sessiondestroy', function(){
    session()->forget('Email');
    return view('Login');
});

Route::post('/contactus/submit', [Contact_Us_Controller::class, 'index']);

Route::post('/Subscribe', [SubscribeInsert::class, 'Subscribe']);

Route::get('/MathTools/RandomNumberGenerator', function(){
    return view('MathTools.RandomNumberGenerator');
});
Route::get('/MathController/RandomNumber', [MathTools::class, 'RandomNumber']);

Route::get('/MathTools/Percentage', function(){
    return view('MathTools.Percentage');
});
Route::get('/MathController/Percentage', [MathTools::class, 'Percentage']);
Route::get('/MathTools/Exponent', function(){
    return view('MathTools.Exponent');
});

Route::get('/Statistics', function(){
    return view('Statistics');
});

Route::get('/Set', function(){
    return view('SetCalculator');
});
Route::post('/Set', [SetCalculation::class, 'performSetOperation']);

Route::get('/EncodeDecode', [EncodeDecode_controller::class, 'index']);
Route::post('/Encode', [EncodeDecode_controller::class, 'Encode']);
Route::post('/Decode', [EncodeDecode_controller::class, 'Decode']);

Route::get('/RandomPassword', function(){
    return view('RandomPasswordgenerator');
});
Route::post('/RandomPassword', [RandomPasswordGeneratorController::class, 'index']);

Route::get('/ipdetector', function(){
    return view('ip detector');
});

Route::get('/BMI', function(){
    return view('BMI');
});
Route::post('/BMI/Check', [BMI_Controller::class, 'index']);

Route::get('/MatrixCalculator/Addition', function(){
    return view('MatrixCalculator.Addition');
});
Route::post('/MatrixCalculator/Addition',[MatrixCalculator::class, 'processMatrixAddition']);

Route::get('/MatrixCalculator/Substraction', function(){
    return view('MatrixCalculator.Substraction');
});
Route::post('/MatrixCalculator/Substraction',[MatrixCalculator::class, 'processMatrixSubstraction']);

Route::get('/MatrixCalculator/Multiplication', function(){
    return view('MatrixCalculator.Multiplication');
});
Route::post('/MatrixCalculator/Multiplication',[MatrixCalculator::class, 'processMatrixMultiplication']);

Route::get('/MatrixCalculator/Transpose', function(){
    return view('MatrixCalculator.Transpose');
});
Route::post('/MatrixCalculator/Transpose',[MatrixCalculator::class, 'processMatrixTranspose']);

Route::get('/MatrixCalculator/ScalarMultiplication', function(){
    return view('MatrixCalculator.ScalarMultiplication');
});
Route::post('/MatrixCalculator/ScalarMultiplication', [MatrixCalculator::class, 'scalarMultiplication']);

Route::get('/MatrixCalculator/PowerofMatrix', function(){
    return view('MatrixCalculator.PowerofMatrix');
});
Route::post('/MatrixCalculator/PowerofMatrix', [MatrixCalculator::class, 'powerOfMatrix']);

Route::get('/MatrixCalculator/Determinant', function(){
    return view('MatrixCalculator.Determinant');
});
Route::post('/MatrixCalculator/Determinant', [MatrixCalculator::class, 'Determinant']);