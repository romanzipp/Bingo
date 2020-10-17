<?php

namespace Domain\Game\Actions;

use Domain\Game\Data\UpdateBoardCardData;
use Domain\Game\Models\Pivot\BoardCard;

class UpdateBoardCard
{
    public function execute(BoardCard $boardCard, UpdateBoardCardData $data): BoardCard
    {
        $boardCard->checked = $data->checked;
        $boardCard->save();

        return $boardCard;
    }
}
