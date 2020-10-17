<?php

namespace Domain\Game\Data;

use Domain\Game\Models\Game;
use Support\Data\AbstractData;

class CreateBoardData extends AbstractData
{
    protected static array $required = [
        'games',
    ];

    public Game $game;
}
