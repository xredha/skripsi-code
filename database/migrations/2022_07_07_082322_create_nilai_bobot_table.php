<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiBobotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_bobot', function (Blueprint $table) {
            $table->id();
            $table->float('nilai');
            $table->integer('id_kriteria');
            $table->integer('id_alternatif');
            $table->unique(['id_kriteria', 'id_alternatif']);
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
        Schema::dropIfExists('nilai_bobot');
    }
}
