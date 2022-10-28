<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropClientServiceInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('client_service_information');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('client_service_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->date('commencement_date');
            $table->date('authorized_start_date');
            $table->integer('authorized_service_hours')->nullable();
            $table->integer('authorized_service_days')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
