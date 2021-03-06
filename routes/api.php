<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Client\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


try{

Route::get('/test', function() {
   $response = Http::withBasicAuth('applicant', 'canCode')
   ->get('https://www.axxess.co.za/careers/dev-test-instructions');


        if ($response->getStatusCode() == 200) { 
            echo $response->getBody();
            
        }
}); 


} catch(RequestException $e) {

    $response = ($e->hasResponse()) ? $e->getResponse() : 'getting data failed';
    $statuscode = $response->getStatusCode();
    $body = $response->getBody();

    Log::error($body);

        return [
            'success' => false,
            'status_code' => $statuscode,
            'body' => $body ?? null,
        ];

};


try{
Route::get('/postinfo', function() {
 $response = Http::withBasicAuth('applicant', 'canCode')
    ->post('https://www.axxess.co.za/careers/download-dev-test', [

    'first_name' => 'Phenyo',
    'last_name' => 'Mokgadi', 
    'mobile_number' => '0720549583',
    'email_address' => 'phenyo.legend@gmail.com',
]); 

   echo  $response->body();
});
} catch (RequestException $e) {

    $response = ($e->hasResponse()) ? $e->getResponse() : 'sending data failed';
    $statuscode = $response->getStatusCode();
    $body = $response->getBody();

    Log::error($body);

        return [
            'success' => false,
            'status_code' => $statuscode,
            'body' => $body ?? null,
        ];
    };

