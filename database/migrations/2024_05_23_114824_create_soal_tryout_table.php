<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTryoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_tryout', function (Blueprint $table) {
            $table->id();
            $table->string('question_type');
            $table->string('tps_type')->nullable();
            $table->string('penalaran_type')->nullable();
            $table->string('penalaran_induktif_detail')->nullable();
            $table->string('penalaran_deduktif_detail')->nullable();
            $table->string('penalaran_kuantitatif_detail')->nullable();
            $table->string('pemahaman_pemahaman_type')->nullable();
            $table->string('pemahaman_type')->nullable();
            $table->string('kuantitatif_type')->nullable();
            $table->string('tl_type')->nullable();
            $table->string('tl_indonesia_type')->nullable();
            $table->string('tl_matematika_type')->nullable();
            $table->string('tl_inggris_type')->nullable();
            $table->text('question');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->string('option_e');
            $table->string('correct_answer');
            $table->text('answer_explanation');
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
        Schema::dropIfExists('soal_tryout');
    }
}
