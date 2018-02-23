<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameGameItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_game_item', function (Blueprint $table) {
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('game_item_id');

            $table->primary(['game_id', 'game_item_id']);

            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');

            $table->foreign('game_item_id')
                ->references('id')
                ->on('game_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_game_item');
    }
}
