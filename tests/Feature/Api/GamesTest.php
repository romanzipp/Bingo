<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GamesTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreate()
    {
        $response = $this->post('api/games', [
            'title' => 'Foo',
            'cards' => [
                'Foo1',
                'Foo2',
                'Foo3',
                'Foo4',
                'Foo5',
            ],
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'game' => [
                'id',
                'title',
                'secret',
                'updated_at',
                'created_at',
            ],
        ]);
    }

    public function testCreateMissingTitle()
    {
        $response = $this->post('api/games', [
            'cards' => [
                'Foo1',
                'Foo2',
                'Foo3',
                'Foo4',
                'Foo5',
            ],
        ]);

        $response->assertStatus(422);
    }

    public function testCreateMissingCards()
    {
        $response = $this->post('api/games', [
            'title' => 'Foo',
        ]);

        $response->assertStatus(422);
    }

    public function testCreateInsufficientCards()
    {
        $response = $this->post('api/games', [
            'cards' => [
                'Foo1',
                'Foo2',
                'Foo3',
                'Foo4',
            ],
        ]);

        $response->assertStatus(422);
    }
}
