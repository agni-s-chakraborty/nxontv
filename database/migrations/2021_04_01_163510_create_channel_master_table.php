<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_master', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id');
            $table->string('channel_name')->nullable();   
            $table->bigInteger('channel_genre_id');   
            $table->bigInteger('languages_id');     
            $table->text('channel_description')->nullable();  
            $table->string('region')->nullable();  
            $table->string('channel_logo_1')->nullable();  
            $table->string('channel_logo_2')->nullable();  
            $table->string('channel_logo_3')->nullable();
            $table->string('channel_catchup')->nullable(); 
            $table->string('channel_trp')->nullable(); 
            $table->string('status')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_master');
    }
}
