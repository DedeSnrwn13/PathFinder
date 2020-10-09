<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nama_sekolah');
            $table->string('jenjang_pendidikan');
            $table->string('jurusan');
            $table->string('nilai');
            $table->date('mulai_pendidikan');
            $table->date('selesai_pendidikan');

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
        Schema::dropIfExists('pendidikan');
    }
}
