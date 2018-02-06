<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('cover');
            $table->string('title');
            $table->string('en_title');
            $table->string('city');
            $table->string('en_city');
            $table->string('dirname');
            $table->dateTime('date');
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
        Schema::dropIfExists('past_events');
    }
}
