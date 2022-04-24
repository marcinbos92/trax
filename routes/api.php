<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


//////////////////////////////////////////////////////////////////////////
/// Mock Endpoints To Be Replaced With RESTful API.
/// - API implementation needs to return data in the format seen below.
/// - Post data will be in the format seen below.
/// - /resource/assets/traxAPI.js will have to be updated to align with
///   the API implementation
//////////////////////////////////////////////////////////////////////////

Route::middleware(['auth:api'])->group(function () {
    Route::get('/cars', 'CarController@listAction');
    Route::get('/cars/{id}', 'CarController@viewAction');
    Route::delete('/cars/{id}', 'CarController@deleteAction');
    Route::post('/cars', 'CarController@createAction');
    Route::get('/trips', 'TripController@listAction');
    Route::post('/trips', 'TripController@createAction');
});

// Mock endpoint to add a new trip.

//Route::post('mock-add-trip', function(Request $request) {
//    $request->validate([
//        'date' => 'required|date', // ISO 8601 string
//        'car_id' => 'required|integer',
//        'miles' => 'required|numeric'
//    ]);
//})->middleware('auth:api');
