<?php

namespace Domain\Game\Http\Controllers\Api\Boards;

use Domain\Game\Http\Resources\BoardResource;
use Domain\Game\Models\Board;
use Illuminate\Http\Request;
use Support\Http\Controllers\AbstractController;

class ShowBoardController extends AbstractController
{
    public function __invoke(Request $request, Board $board)
    {
        $board->load([
            'game',
            'cards',
        ]);

        return new BoardResource($board);
    }
}
