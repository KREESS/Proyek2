<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('soal_tryout_id1')->references('id')->on('soal_tryout')->onDelete('cascade');
            $table->foreign('soal_tryout_id2')->references('id')->on('soal_tryout')->onDelete('cascade');
            $table->foreign('soal_tryout_id3')->references('id')->on('soal_tryout')->onDelete('cascade');
            $table->foreign('soal_tryout_id4')->references('id')->on('soal_tryout')->onDelete('cascade');
            $table->foreign('soal_tryout_id5')->references('id')->on('soal_tryout')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            $table->dropForeign(['soal_tryout_id1']);
            $table->dropForeign(['soal_tryout_id2']);
            $table->dropForeign(['soal_tryout_id3']);
            $table->dropForeign(['soal_tryout_id4']);
            $table->dropForeign(['soal_tryout_id5']);
        });
    }
}
