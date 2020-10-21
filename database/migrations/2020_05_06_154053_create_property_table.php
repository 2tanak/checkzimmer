<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->enum('type', ['general', 'affiliate']);
            $table->enum('status', ['pending', 'approved', 'declined']);
            $table->unsignedInteger('views');
            $table->longText('lat');
            $table->longText('lng');
            $table->string('name');
            $table->string('city');
            $table->integer('zip');
            $table->integer('price');
            $table->integer('hotel_rating');
            $table->string('address');
            $table->string('slug');
            $table->longText('description');
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
        Schema::dropIfExists('property');
    }
}
