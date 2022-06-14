<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_competition_id');
            $table->string('description');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image_url')->nullable();
            $table->string('juknis_url')->nullable();
            $table->enum('status', [0, 1])->default(0);
            // status 0 = draft, 1 = published
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
        Schema::dropIfExists('competitions');
    }
}
