<?php

namespace Domain\Game\Actions;

use Domain\Game\Data\CreateBoardData;
use Domain\Game\Models\Board;
use Domain\Game\Models\Pivot\BoardCard;

class CreateBoard
{
    public function execute(CreateBoardData $data): Board
    {
        $board = new Board([]);
        $board->game()->associate($data->game);

        $board->save();

        foreach ($data->game->cards as $card) {

            $boardCard = new BoardCard();

            $boardCard->board()->associate($board);
            $boardCard->card()->associate($card);

            $boardCard->save();
        }

        return $board;
    }
}
