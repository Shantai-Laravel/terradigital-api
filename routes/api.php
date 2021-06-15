<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\CallRequestMail;
use App\Http\Controllers\MailController;

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

Route::any('mail/acceptPolicies', [MailController::class, 'acceptPolicies']);

// Route::group(['middleware' => 'cors'], function(){
//     Route::any('mail/acceptPolicies', [MailController::class, 'acceptPolicies']);
// });

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/test', function() {
        dd('test auth');
    });
});
