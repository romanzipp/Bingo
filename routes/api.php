<?php

Route::prefix('games')->group(function () {

    Route::post('', \Domain\Game\Http\Controllers\Api\Games\StoreGameController::class);

});
