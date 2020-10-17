<?php

Route::prefix('games')->group(function () {

    Route::prefix('{game}')->group(function () {

        Route::get('', \Domain\Game\Http\Controllers\Api\Games\ShowGameController::class);

        Route::prefix('boards')->group(function () {

            Route::post('', \Domain\Game\Http\Controllers\Api\Boards\StoreBoardController::class);

        });

    });

    Route::post('', \Domain\Game\Http\Controllers\Api\Games\StoreGameController::class);

});
