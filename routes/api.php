<?php

Route::prefix('games')->group(function () {
    Route::prefix('{game}')->group(function () {
        Route::get('', \Domain\Game\Http\Controllers\Api\Games\ShowGameController::class);
    });

    Route::post('', \Domain\Game\Http\Controllers\Api\Games\StoreGameController::class)->middleware('throttle:5,1');
});

Route::prefix('boards')->group(function () {
    Route::prefix('{board}')->group(function () {
        Route::get('', \Domain\Game\Http\Controllers\Api\Boards\ShowBoardController::class);
    });

    Route::post('', \Domain\Game\Http\Controllers\Api\Boards\StoreBoardController::class)->middleware('throttle:20,1');
});

Route::prefix('board-cards')->group(function () {
    Route::prefix('{boardCard}')->group(function () {
        Route::patch('', \Domain\Game\Http\Controllers\Api\BoardCards\UpdateBoardCardController::class);
    });
});
