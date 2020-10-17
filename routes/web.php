<?php

use Illuminate\Support\Facades\Route;

Route::get('/{catchall?}', \App\Http\Controllers\AppController::class)->where('catchall', '^(?!api|admin|broadcasting|socket.io).*$');
