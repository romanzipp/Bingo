<?php

namespace Database\Seeders;

use Domain\Game\Actions\CreateGame;
use Domain\Game\Data\CreateGameData;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private CreateGame $createGame;

    public function __construct(CreateGame $createGame)
    {
        $this->createGame = $createGame;
    }

    public function run()
    {
        $this->createGame->execute(
            new CreateGameData([
                'title' => 'Apple Keynote',
                'cards' => [
                    'Innovation',
                    'Best iPhone camera ever',
                ],
            ])
        );
    }
}
