<?php

namespace Domain\Game\Models;

use Domain\Game\Models\Pivot\BoardCard;
use Support\Enums\TableName;
use Support\Models\AbstractModel;

class Board extends AbstractModel
{
    protected $table = TableName::GAME_BOARDS;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function cards()
    {
        return $this
            ->belongsToMany(Card::class, BoardCard::class)
            ->withPivot([
                'id',
                'checked',
                'order',
            ]);
    }
}
