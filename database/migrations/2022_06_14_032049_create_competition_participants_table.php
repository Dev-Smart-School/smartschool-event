<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_participants', function (Blueprint $table) {
            $table->id();
            $table->integer('competition_id');
            $table->integer('user_id');
            $table->string('description');
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', [0, 1, 2, 3])->default(0);
            // status 0 = pending, 1 = accepted, 2 = candidate, 3 = winner
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
        Schema::dropIfExists('competition_participants');
    }
}
