<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Models\Event;

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


Route::get('v1/events', function()
{
    return Event::all();
});

Route::post('events', function()
{
    return Event::create([
        'name' => request('name'),
        'slug' => request('slug'),
        'created_at' => request('created_at'),
        'updated_at' => request('updated_at'),
    ]);
});

Route::delete('v1/events/{post}', function(Event $post)
{
$success = $post->delete();
return[
    'success' => $success
];
});