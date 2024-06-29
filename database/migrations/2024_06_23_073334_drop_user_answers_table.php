<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('user_answers');
    }

    public function down()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('soal_tryout_id1')->nullable()->constrained('soal_tryouts')->onDelete('cascade');
            $table->string('jawaban1')->nullable();
            $table->foreignId('soal_tryout_id2')->nullable()->constrained('soal_tryouts')->onDelete('cascade');
            $table->string('jawaban2')->nullable();
            $table->foreignId('soal_tryout_id3')->nullable()->constrained('soal_tryouts')->onDelete('cascade');
            $table->string('jawaban3')->nullable();
            $table->foreignId('soal_tryout_id4')->nullable()->constrained('soal_tryouts')->onDelete('cascade');
            $table->string('jawaban4')->nullable();
            $table->foreignId('soal_tryout_id5')->nullable()->constrained('soal_tryouts')->onDelete('cascade');
            $table->string('jawaban5')->nullable();
            $table->timestamps();
        });
    }
}
