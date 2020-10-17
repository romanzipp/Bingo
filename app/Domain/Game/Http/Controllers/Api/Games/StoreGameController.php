<?php

namespace Domain\Game\Http\Controllers\Api\Games;

use Domain\Game\Actions\CreateGame;
use Domain\Game\Data\CreateGameData;
use Domain\Game\Http\Resources\GameResource;
use Illuminate\Http\Request;
use Support\Http\Controllers\AbstractController;

class StoreGameController extends AbstractController
{
    private CreateGame $createGame;

    public function __construct(CreateGame $createGame)
    {
        $this->createGame = $createGame;
    }

    public function __invoke(Request $request)
    {
        $payload = $request->validate([
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'cards' => ['required', 'array', 'min:5', 'max:80'],
            'cards.*' => ['string', 'min:1', 'max:255'],
        ]);

        $game = $this->createGame->execute(
            new CreateGameData($payload)
        );

        return new GameResource($game);
    }
}
