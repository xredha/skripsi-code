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
            $table->integer('kriteria_id');
            $table->integer('alternatif_id');
            $table->timestamps();

            $table->unique(['kriteria_id', 'alternatif_id'], 'kriteria_id_alternatif_id_unique');
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
