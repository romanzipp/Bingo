<?php

namespace Domain\Game\Http\Resources;

use Support\Http\Resources\AbstractResource;

class CardResource extends AbstractResource
{
    public static $wrap = 'card';

    public function toArray($request)
    {
        /** @var \Domain\Game\Models\Card $card */
        $card = $this->resource;

        return [
            'id' => $card->id,
            'title' => $card->title,

            'game' => new GameResource(
                $this->whenLoaded('game')
            ),

            $this->mergeWhen($card->pivot, fn () => [
                'pivot' => [
                    'id' => $card->pivot->id,
                    'checked' => $card->pivot->checked,
                    'order' => $card->pivot->order,
                ],
            ]),
        ];
    }
}
