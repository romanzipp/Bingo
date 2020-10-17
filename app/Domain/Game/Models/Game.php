<?php

namespace Domain\Game\Models;

use Domain\Game\Models\Pivot\GameBoard;
use Support\Enums\TableName;
use Support\Models\AbstractModel;

class Game extends AbstractModel
{
    protected $table = TableName::GAME_GAMES;

    public function boards()
    {
        return $this->hasManyThrough(Board::class, GameBoard::class);
    }
}
