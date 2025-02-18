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
        Schema::create('question_img_provisional', function (Blueprint $table) {
            $table->id();
            $table->longText("question");
            $table->boolean("correct");
            $table->longText("realNew");
            $table->string("img")->nullable();
            
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('question_img_provisional');
    }
};
