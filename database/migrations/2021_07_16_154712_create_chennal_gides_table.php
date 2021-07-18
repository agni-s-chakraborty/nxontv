<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChennalGidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chennal_gides', function (Blueprint $table) {
            $table->id();
            $table->string('operator_name');
            $table->string('chennal_file');
            $table->string('chennal_name');
            $table->string('hd_sd');
            $table->string('lcn');
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
        Schema::dropIfExists('chennal_gides');
    }
}
