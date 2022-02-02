<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id');
            $table->bigInteger('guest_id');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->bigInteger('league_id')->nullable();
            $table->string('tur')->nullable();
            $table->integer('owner_score')->default(0);
            $table->integer('guest_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
