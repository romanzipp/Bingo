<?php

Route::prefix('games')->group(function () {

    Route::get('{game}', \Domain\Game\Http\Controllers\Api\Games\ShowGameController::class);

    Route::post('', \Domain\Game\Http\Controllers\Api\Games\StoreGameController::class);

});
