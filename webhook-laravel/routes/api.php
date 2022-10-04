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
    $token = 'hapusJikaTidakDiperlukanAtauKomen';
    $baseUrl = 'http://127.0.0.1:10001/api';

    if ($input['event'] === 'new' && $input['type'] === 'message' && $data['type'] === 'text')
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'bearer ' . $token,
    ])->post($baseUrl . '/messages?direct=true', [
        "to" => $data['sender'],
        "text" => $data['text']
    ]);
    
    return response()->json([
        "status" => $response->status(),
        "data" => $input,
    ]);
});


/* GET MESSAGES */
function getMessages() {
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'bearer TOKEN-DI-DASHBOARD',
    ])->get('https://demo.maxchat.id/demo6/api/messages');

    echo $response;
}
getMessages();


/* SEND MESSAGES */
function sendMessages() {
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'bearer TOKEN-DI-DASHBOARD'
    ])->post('https://demo.maxchat.id/demo1/api/messages', [
        "to" => "6281331747426",
        "text" => "hello"
    ]);

    echo $response->status();
}
//sendMessages();