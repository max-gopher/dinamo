<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeScoreFieldsInGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::table('games')->truncate();
            $table->integer('owner_score')->default(null)->nullable()->change();
            $table->integer('guest_score')->default(null)->nullable()->change();
            $table->bigInteger('opponent_id');
            $table->dropColumn('owner_id');
            $table->dropColumn('guest_id');
            $table->string('who');
            $table->renameColumn('owner_score', 'our_score');
            $table->renameColumn('guest_score', 'opponent_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::table('games')->truncate();
            $table->integer('owner_score')->default(0)->change();
            $table->integer('guest_score')->default(0)->change();
            $table->dropColumn('opponent_id');
            $table->dropColumn('who');
            $table->bigInteger('owner_id');
            $table->bigInteger('guest_id');
            $table->renameColumn('our_score', 'owner_score');
            $table->renameColumn('opponent_score', 'guest_score');
        });
    }
}
