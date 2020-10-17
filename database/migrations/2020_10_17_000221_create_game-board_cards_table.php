<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Support\Enums\TableName;

class CreateGameBoardCardsTable extends Migration
{
    public function up()
    {
        Schema::create(TableName::GAME_PIVOT_BOARD_CARD, function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->uuid('board_id');
            $table->uuid('card_id');

            $table->boolean('checked')->default(false);

            $table->timestamps();

            $table->foreign('board_id')->references('id')->on(TableName::GAME_BOARDS)->cascadeOnDelete();
            $table->foreign('card_id')->references('id')->on(TableName::GAME_CARDS)->cascadeOnDelete();

        });
    }

    public function down()
    {
        Schema::dropIfExists(TableName::GAME_PIVOT_BOARD_CARD);
    }
}
