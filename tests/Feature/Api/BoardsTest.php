<?php

namespace Tests\Feature\Api;

use Domain\Game\Actions\CreateGame;
use Domain\Game\Data\CreateGameData;
use Domain\Game\Models\Game;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class BoardsTest extends TestCase
{
    use DatabaseMigrations;

    private Game $game;

    public function setUp(): void
    {
        parent::setUp();

        $this->game = app(CreateGame::class)->execute(
            new CreateGameData([
                'title' => 'Foo',
                'cards' => [
                    'Foo1',
                    'Foo2',
                    'Foo3',
                    'Foo4',
                    'Foo5',
                ],
            ])
        );
    }

    public function testCreate()
    {
        $response = $this->post('api/boards', [
            'game_id' => $this->game->id,
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'board' => [
                'id',
                'created_at',
                'updated_at',
                'game' => [
                    'id',
                    'title',
                    'secret',
                    'updated_at',
                    'created_at',
                ],
            ],
        ]);
    }

    public function testCreateMissingGame()
    {
        $response = $this->post('api/boards', [
            'game_id' => Uuid::uuid4(),
        ]);

        $response->assertStatus(422);
    }
}
