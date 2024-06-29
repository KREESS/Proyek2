<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanPengguna2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_pengguna2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Kolom untuk menyimpan jawaban dari 20 soal tryout
            for ($i = 1; $i <= 20; $i++) {
                $table->foreignId("soal_tryout_id_$i")->constrained('soal_tryouts')->onDelete('cascade')->nullable();
                $table->string("jawaban_$i")->nullable();
            }

            $table->timestamps();

            // Indeks untuk performa pencarian
            $table->index(['user_id']);

            // Unique constraint untuk mencegah duplikasi jawaban dari user yang sama
            $table->unique(['user_id']);

            // Foreign key constraint
            for ($i = 1; $i <= 20; $i++) {
                $table->foreign("soal_tryout_id_$i")->references('id')->on('soal_tryouts')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_pengguna2');
    }
}
