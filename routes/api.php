<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\CallRequestMail;

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

Route::get('test-email', function ()
{
    Mail::to('iovitatudor@gmail.com')->send(new CallRequestMail());
    return new CallRequestMail();
});


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/test', function() {
        dd('lorem');
    });
});
