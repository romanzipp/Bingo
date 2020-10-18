<?php

namespace Domain\Game\Http\Resources;

use Support\Http\Resources\AbstractResource;

class BoardResource extends AbstractResource
{
    public static $wrap = 'board';

    public function toArray($request)
    {
        /** @var \Domain\Game\Models\Board $board */
        $board = $this->resource;

        return [
            'id' => $board->id,

            'game' => new GameResource(
                $this->whenLoaded('game')
            ),

            'cards' => CardResource::collection(
                $this->whenLoaded('cards')
            ),

            $this->withDates(),
        ];
    }
}
