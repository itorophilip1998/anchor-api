<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitySelectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('activity_selecteds', function (Blueprint $table) {
            $table->id();
            $table->integer('incident_id');
            $table->integer('activity_id');
            $table->string('activity');
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
        Schema::dropIfExists('activity_selecteds');
    }
}