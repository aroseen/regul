<?php

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

use App\Events\ProcessingStarted;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $fields = [];
    for ($i = 1; $i <= 3; $i++) {
        $fields[] = [
            'id'    => 'identifier-'.$i,
            'name'  => 'field_'.$i,
            'title' => 'Field '.$i,
        ];
    }

    return view('home', [
        'fields' => json_encode($fields),
    ]);
});

Route::post('/', function () {
    broadcast(new ProcessingStarted());
});

Route::get('/{wildcard}', function () {
    return view('layouts.app');
});
