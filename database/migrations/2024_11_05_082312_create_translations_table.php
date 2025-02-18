<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idquestionimg');
            $table->enum('language', ['de', 'es', 'it']);
            $table->longText("question");
            $table->longText("realNew");
            $table->unique(['idquestionimg', 'language']);
            $table->foreign('idquestionimg')->references('id')->on('question_img');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translations');
    }
};
