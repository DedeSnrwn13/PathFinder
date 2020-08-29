<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            // $table->foreignId('institution_id')->constrained('institution')->onDelete('cascade')->onUpdate('cascade');
            // $table->bigInteger('institution_id')->unsigned();
            $table->string('role')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('activation_code')->nullable();
            $table->boolean('active')->default(0);

            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('institution_id')->references('id')->on('institution')
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
        Schema::dropIfExists('users');
    }
}
