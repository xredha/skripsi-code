<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->id();
            $table->integer('range');
            $table->float('nilai');
            $table->integer('id_kriteria');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE subkriteria ADD CONSTRAINT check_nilai_value CHECK (nilai >= 1 AND nilai <= 10);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subkriteria');
    }
}
