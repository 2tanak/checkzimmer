<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('property_id');
            $table->unsignedInteger('room_type_id');
            $table->integer('number');
            $table->integer('person');
            $table->float('price');
            $table->enum('bed', ['single', 'double', 'none']);
            $table->enum('shower', ['single', 'shared', 'none']);
            $table->enum('kitchen', ['single', 'shared', 'kitchenette', 'none']);
            $table->enum('status', ['pending', 'approved', 'declined']);
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
        Schema::dropIfExists('rooms');
    }
}
