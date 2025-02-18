<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('videoUrl'); // Url for video
            $table->string("buttonOption1",250); // Information about button 1 specifics
            $table->string("buttonOption2",250); // Information about button 2 specifics
            $table->string("videoUrlOption1",250); // This is video url, if button 1 is pressed.
            $table->string("videoUrlOption2",250); // This is video url, if button 2 is pressed.
            $table->string("resultText",250); // Resulttext for final video in game chain.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
