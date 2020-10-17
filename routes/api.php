<?php

Route::prefix('games')->group(function () {

    Route::prefix('{game}')->group(function () {

        Route::get('', \Domain\Game\Http\Controllers\Api\Games\ShowGameController::class);

    });

    Route::post('', \Domain\Game\Http\Controllers\Api\Games\StoreGameController::class);

});

Route::prefix('boards')->group(function () {

    Route::prefix('{board}')->group(function () {

        Route::get('', \Domain\Game\Http\Controllers\Api\Boards\ShowBoardController::class);

    });

    Route::post('', \Domain\Game\Http\Controllers\Api\Boards\StoreBoardController::class);

});
