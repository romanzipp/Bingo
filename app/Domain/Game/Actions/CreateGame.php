<?php

namespace Domain\Game\Actions;

use Domain\Game\Data\CreateGameData;
use Domain\Game\Models\Card;
use Domain\Game\Models\Game;
use Ramsey\Uuid\Uuid;

class CreateGame
{
    public function execute(CreateGameData $data): Game
    {
        $game = new Game([
            'secret' => Uuid::uuid4(),
            'title' => $data->title,
        ]);

        $game->save();

        foreach ($data->cards as $word) {

            $card = new Card([
                'title' => $word,
            ]);

            $card->game()->associate($game);
            $card->save();
        }

        return $game;
    }
}
