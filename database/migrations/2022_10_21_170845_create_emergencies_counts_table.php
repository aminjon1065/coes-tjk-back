<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergenciesCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergencies_counts', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->string('emergency');
            $table->integer('count');
            $table->bigInteger('year');
            $table->date("date");
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
        Schema::dropIfExists('emergencies_counts');
    }
}
