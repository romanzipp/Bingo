<?php

namespace Domain\Game\Data;

use Support\Data\AbstractData;

class CreateGameData extends AbstractData
{
    protected static array $required = [
        'title',
        'cards',
    ];

    public string $title;

    public array $cards;
}
