<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Support\Enums\TableName;

class CreateGameGamesTable extends Migration
{
    public function up()
    {
        Schema::create(TableName::GAME_GAMES, function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->uuid('secret');

            $table->string('title');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists(TableName::GAME_GAMES);
    }
}
