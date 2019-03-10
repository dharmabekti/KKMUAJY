<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengurusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penguruses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('npm');
            $table->string('gender');
            $table->string('prodi_id');
            $table->string('jabatan_id');
            $table->string('no_telp');
            $table->string('email');
            $table->string('id_line');
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
        Schema::dropIfExists('penguruses');
    }
}
