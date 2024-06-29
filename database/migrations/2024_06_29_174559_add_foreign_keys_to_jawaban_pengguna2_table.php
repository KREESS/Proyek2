<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToJawabanPengguna2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawaban_pengguna2', function (Blueprint $table) {
            // Tambahkan foreign key untuk setiap kolom soal_tryout_id_$i
            for ($i = 1; $i <= 20; $i++) {
                $table->foreign("soal_tryout_id_$i")->references('id')->on('soal_tryout')->onDelete('cascade');
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
        Schema::table('jawaban_pengguna2', function (Blueprint $table) {
            // Hapus foreign key untuk setiap kolom soal_tryout_id_$i
            for ($i = 1; $i <= 20; $i++) {
                $table->dropForeign("jawaban_pengguna2_soal_tryout_id_$i_foreign");
            }
        });
    }
}

