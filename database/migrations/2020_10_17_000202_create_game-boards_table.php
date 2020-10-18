<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Support\Enums\TableName;

class CreateGameBoardsTable extends Migration
{
    public function up()
    {
        Schema::create(TableName::GAME_BOARDS, function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('game_id');

            $table->timestamps();

            $table->foreign('game_id')->references('id')->on(TableName::GAME_GAMES)->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists(TableName::GAME_BOARDS);
    }
}
