<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddOptionsTableTypeColumnFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            //$table->enum('type', ['property', 'options', 'system', 'room', 'city', 'room_type', 'feature', 'domain', 'user'])->change();
            DB::statement("ALTER TABLE options MODIFY COLUMN `type` ENUM('property', 'options', 'system', 'room', 'city', 'room_type', 'feature', 'domain', 'user')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            //
        });
    }
}
