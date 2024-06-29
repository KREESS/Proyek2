<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJawabanColumnsToUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            $table->string('jawaban1')->nullable(); // Adding the jawaban1 column
            $table->string('jawaban2')->nullable(); // Adding the jawaban2 column
            $table->string('jawaban3')->nullable(); // Adding the jawaban3 column
            $table->string('jawaban4')->nullable(); // Adding the jawaban4 column
            $table->string('jawaban5')->nullable(); // Adding the jawaban5 column
        });
    }

    public function down()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            $table->dropColumn(['jawaban1', 'jawaban2', 'jawaban3', 'jawaban4', 'jawaban5']); // Dropping the jawaban columns in rollback
        });
    }
}

