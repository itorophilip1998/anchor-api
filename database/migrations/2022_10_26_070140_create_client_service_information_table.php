<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientServiceInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_service_information');
    }
}
