<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('user_id');
            $table->string('hobby_one')->nullable();
            $table->string('hobby_two')->nullable();
            $table->string('hobby_three')->nullable();
            $table->string('hobby_four')->nullable();
            $table->string('hobby_five')->nullable();

            $table->string('strenght_one')->nullable();
            $table->string('strenght_two')->nullable();
            $table->string('strenght_three')->nullable();
            $table->string('strenght_four')->nullable();
            $table->string('strenght_five')->nullable();

            $table->string('weakness_one')->nullable();
            $table->string('weakness_two')->nullable();
            $table->string('weakness_three')->nullable();
            $table->string('weakness_four')->nullable();
            $table->string('weakness_five')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
}
