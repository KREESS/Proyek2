<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMateriIdNullableInSoalTryoutTable extends Migration
{
    public function up()
    {
        Schema::table('soal_tryout', function (Blueprint $table) {
            $table->unsignedBigInteger('materi_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('soal_tryout', function (Blueprint $table) {
            $table->unsignedBigInteger('materi_id')->nullable(false)->change();
        });
    }
}
