<?php

namespace Domain\Game\Http\Resources;

use Support\Http\Resources\AbstractResource;

class GameResource extends AbstractResource
{
    public static $wrap = 'game';

    public function toArray($request)
    {
        /** @var \Domain\Game\Models\Game $game */
        $game = $this->resource;

        return [
            'id' => $game->id,
            'title' => $game->title,

            'secret' => $game->wasRecentlyCreated ? $game->secret : null,

            'cards' => CardResource::collection(
                $this->whenLoaded('cards')
            ),

            $this->withDates(),
        ];
    }
}
