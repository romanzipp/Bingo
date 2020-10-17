<?php

namespace Domain\Game\Models\Pivot;

use Domain\Game\Models\Board;
use Domain\Game\Models\Card;
use Support\Enums\TableName;
use Support\Models\AbstractPivotModel;

class BoardCard extends AbstractPivotModel
{
    protected $table = TableName::GAME_PIVOT_BOARD_CARD;

    protected $casts = [
        'checked' => 'boolean',
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
