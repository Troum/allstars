<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->dateTime('date');
            $table->dateTime('time');
            $table->string('place');
            $table->string('en_place');
            $table->string('city');
            $table->string('en_city');
            $table->string('ticket_id')->default(null);
            $table->longText('price')->default(null);
            $table->longText('en_price')->default(null);
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
        Schema::dropIfExists('additionals');
    }
}
