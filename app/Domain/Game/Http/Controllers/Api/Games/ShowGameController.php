<?php

namespace Domain\Game\Http\Controllers\Api\Games;

use Domain\Game\Http\Resources\GameResource;
use Domain\Game\Models\Game;
use Illuminate\Http\Request;
use Support\Http\Controllers\AbstractController;

class ShowGameController extends AbstractController
{
    public function __invoke(Request $request, Game $game)
    {
        $game->load([
            'cards',
        ]);

        return new GameResource($game);
    }
}
