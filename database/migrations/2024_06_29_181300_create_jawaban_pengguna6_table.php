<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanPengguna6Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_pengguna6', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Kolom untuk menyimpan jawaban dari 20 soal tryout
            for ($i = 1; $i <= 30; $i++) {
                $table->unsignedBigInteger("soal_tryout_id_$i")->nullable();
                $table->string("jawaban_$i")->nullable();
            }

            $table->timestamps();

            // Indeks untuk performa pencarian
            $table->index(['user_id']);

            // Unique constraint untuk mencegah duplikasi jawaban dari user yang sama
            $table->unique(['user_id']);

            // Foreign key constraint
            for ($i = 1; $i <= 30; $table->foreign("soal_tryout_id_$i")->references('id')->on('soal_tryout')->onDelete('cascade'), $i++);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban_pengguna6', function (Blueprint $table) {
            // Hapus foreign key untuk setiap kolom soal_tryout_id_$i
            for ($i = 1; $i <= 30; $table->dropForeign("jawaban_pengguna6_soal_tryout_id_$i_foreign"), $i++);
        });
        Schema::dropIfExists('jawaban_pengguna6');
    }
}
