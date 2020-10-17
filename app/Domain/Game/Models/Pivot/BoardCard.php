<?php

namespace Domain\Game\Models\Pivot;

use Domain\Game\Models\Card;
use Domain\Game\Models\Game;
use Support\Enums\TableName;
use Support\Models\AbstractPivotModel;

class BoardCard extends AbstractPivotModel
{
    protected $table = TableName::GAME_PIVOT_BOARD_CARD;

    protected $casts = [
        'checked' => 'boolean',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
