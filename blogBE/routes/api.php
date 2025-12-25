<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/products', function () {

});
Route::post('register', function (Request $request) {
    $user = new User();
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save();
    if($user) {
        return response()->json(['status'=>true]);
    } else {
        return response()->json(['status'=>false]);
    }
});
