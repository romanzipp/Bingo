<?php

namespace Domain\Game\Actions;

use Domain\Game\Data\CreateBoardData;
use Domain\Game\Models\Board;

class CreateBoard
{
    public function execute(CreateBoardData $data): Board
    {
        $board = new Board([]);
        $board->game()->associate($data->game);

        $board->save();

        return $board;
    }
}
