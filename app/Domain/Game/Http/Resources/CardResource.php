<?php

namespace Domain\Game\Http\Resources;

use Support\Http\Resources\AbstractResource;

class CardResource extends AbstractResource
{
    public function toArray($request)
    {
        /** @var \Domain\Game\Models\Card $card */
        $card = $this->resource;

        return [
            'id' => $card->id,
            'title' => $card->title,
            'checked' => $card->pivot->checked ?? null,
        ];
    }
}
