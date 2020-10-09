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
            // $table->bigInteger('role_id')->unsigned();
            // $table->string('role');
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('activation_code')->nullable();
            $table->boolean('active')->default(0);
            $table->string('created_by');
            $table->date('created_date');
            $table->string('updated_by');
            $table->date('updated_date');

            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('no action');

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
