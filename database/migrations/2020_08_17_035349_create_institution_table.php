<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->bigInteger('siswa_id')->unsigned();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('contact');
            $table->text('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_confirmation');


            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::table('institution', function (Blueprint $table) {
        //     $table->foreign('siswa_id')->references('id')->on('siswa')
        //         ->onDelete('cascade')->onUpdate('cascade');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution');
    }
}
