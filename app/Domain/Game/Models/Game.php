<?php

namespace Domain\Game\Models;

use Support\Enums\TableName;
use Support\Models\AbstractModel;

class Game extends AbstractModel
{
    protected $table = TableName::GAME_GAMES;

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
