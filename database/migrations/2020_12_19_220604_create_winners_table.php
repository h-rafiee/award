<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'fk_winners_event_id')
                ->on('events')
                ->references('id');
            $table->unsignedBigInteger('mobile_id');
            $table->foreign('mobile_id', 'fk_winners_mobile_id')
                ->on('mobiles')
                ->references('id');
            $table->unsignedBigInteger('event_code_id');
            $table->foreign('event_code_id', 'fk_winners_event_code_id')
                ->on('event_codes')
                ->references('id');
            $table->boolean('is_win')->default(true);
            $table->timestamps();

            $table->unique(['event_id', 'mobile_id', 'event_code_id'], 'unique_winner_columns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winners');
    }
}
