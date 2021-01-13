<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function() {
   $response = Http::withBasicAuth('applicant', 'canCode')->get('https://www.axxess.co.za/careers/dev-test-instructions');


  if ($response->getStatusCode() == 200) { 
    $response_data = $response->getBody()->getContents();
    echo $response_data;
}


}); 

