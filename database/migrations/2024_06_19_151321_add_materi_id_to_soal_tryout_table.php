<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMateriIdToSoalTryoutTable extends Migration
{
    public function up()
    {
        Schema::table('soal_tryout', function (Blueprint $table) {
            $table->unsignedBigInteger('materi_id')->nullable();

            // Menambahkan foreign key constraint
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('soal_tryout', function (Blueprint $table) {
            // Menghapus foreign key constraint terlebih dahulu jika perlu
            $table->dropForeign(['materi_id']);

            // Menghapus kolom materi_id
            $table->dropColumn('materi_id');
        });
    }
}
