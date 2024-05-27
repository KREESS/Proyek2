<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('question_type1');
            $table->string('tps_type1')->nullable();
            $table->string('penalaran_type1')->nullable();
            $table->string('penalaran_induktif_detail1')->nullable();
            $table->string('penalaran_deduktif_detail1')->nullable();
            $table->string('penalaran_kuantitatif_detail1')->nullable();
            $table->string('pemahaman_pemahaman_type1')->nullable();
            $table->string('pemahaman_type1')->nullable();
            $table->string('kuantitatif_type1')->nullable();
            $table->string('tl_type1')->nullable();
            $table->string('tl_indonesia_type1')->nullable();
            $table->string('tl_matematika_type1')->nullable();
            $table->string('tl_inggris_type1')->nullable();
            $table->string('judul');
            $table->text('isi_materi');
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
        Schema::dropIfExists('materi');
    }
}
