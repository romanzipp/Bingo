<?php

namespace Domain\Game\Models;

use Support\Enums\TableName;
use Support\Models\AbstractModel;

class Board extends AbstractModel
{
    protected $table = TableName::GAME_BOARDS;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
