<?php

namespace Domain\Game\Http\Controllers\Api\BoardCards;

use Domain\Game\Actions\UpdateBoardCard;
use Domain\Game\Data\UpdateBoardCardData;
use Domain\Game\Http\Resources\CardResource;
use Domain\Game\Models\Pivot\BoardCard;
use Illuminate\Http\Request;
use Support\Http\Controllers\AbstractController;

class UpdateBoardCardController extends AbstractController
{
    private UpdateBoardCard $updateBoardCard;

    public function __construct(UpdateBoardCard $updateBoardCard)
    {
        $this->updateBoardCard = $updateBoardCard;
    }

    public function __invoke(Request $request, BoardCard $boardCard)
    {
        $payload = $request->validate([
            'checked' => ['integer'],
        ]);

        $boardCard = $this->updateBoardCard->execute(
            $boardCard,
            new UpdateBoardCardData([
                'checked' => (bool) $payload['checked'],
            ])
        );

        /** @var \Domain\Game\Models\Card $card */
        $card = $boardCard->card;

        $card->load([
            'game',
        ]);

        $card->pivot = $boardCard;

        return new CardResource($card);
    }
}
