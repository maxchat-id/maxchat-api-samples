<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('webhook', function (Request $request) {
    $input = $request->all();
    $data = $input['data'];

    if ($input['event'] === 'new' && $input['type'] === 'message' && $data['type'] === 'text')
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'bearer hapusJikaTidakDiperlukanAtauKomen',
    ])->post('http://127.0.0.1:10001/api/messages?direct=true', [
        "to" => $data['sender'],
        "text" => $data['text']
    ]);
    
    return response()->json([
        "status" => $response->status(),
        "data" => $input,
    ]);
});
