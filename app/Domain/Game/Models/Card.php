<?php

namespace Domain\Game\Models;

use Support\Enums\TableName;
use Support\Models\AbstractModel;

class Card extends AbstractModel
{
    protected $table = TableName::GAME_CARDS;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
