<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('user_id');

            $table->string('skill_one')->nullable();
            $table->string('skill_level_one')->nullable();
            $table->string('skill_two')->nullable();
            $table->string('skill_level_two')->nullable();
            $table->string('skill_three')->nullable();
            $table->string('skill_level_three')->nullable();
            $table->string('skill_four')->nullable();
            $table->string('skill_level_four')->nullable();
            $table->string('skill_five')->nullable();
            $table->string('skill_level_five')->nullable();
            $table->string('skill_six')->nullable();
            $table->string('skill_level_six')->nullable();
            $table->string('skill_seven')->nullable();
            $table->string('skill_level_seven')->nullable();
            $table->string('skill_eight')->nullable();
            $table->string('skill_level_eight')->nullable();
            $table->string('skill_nine')->nullable();
            $table->string('skill_level_nine')->nullable();
            $table->string('skill_ten')->nullable();
            $table->string('skill_level_ten')->nullable();

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
        Schema::dropIfExists('skill');
    }
}
