<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentationDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representation_days', function (Blueprint $table) {
            $table->id();
            $table->enum('mon', ['yes', 'no']);
            $table->enum('tue', ['yes', 'no']);
            $table->enum('wed', ['yes', 'no']);
            $table->enum('thu', ['yes', 'no']);
            $table->enum('fri', ['yes', 'no']);
            $table->enum('sat', ['yes', 'no']);
            $table->enum('sun', ['yes', 'no']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representation_day');
    }
}
