<?php

namespace Domain\Game\Http\Controllers\Api\Boards;

use Domain\Game\Actions\CreateBoard;
use Domain\Game\Data\CreateBoardData;
use Domain\Game\Http\Resources\BoardResource;
use Domain\Game\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Support\Http\Controllers\AbstractController;

class StoreBoardController extends AbstractController
{
    private CreateBoard $createBoard;

    public function __construct(CreateBoard $createBoard)
    {
        $this->createBoard = $createBoard;
    }

    public function __invoke(Request $request)
    {
        $payload = $request->validate([
            'game_id' => ['required', 'uuid'],
        ]);

        $game = Game::query()->find($payload['game_id']);

        if ($game === null) {
            throw ValidationException::withMessages([
                'game_id' => 'Game does not exist',
            ]);
        }

        $board = $this->createBoard->execute(
            new CreateBoardData([
                'game' => $game,
            ])
        );

        return new BoardResource($board);
    }
}
