<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('authorized_start_date');
            $table->date('start_date_of_service');
            $table->integer('hours_of_authorized_service')->nullable();
            $table->integer('total_authorized_hours')->nullable();
            $table->integer('total_days_to_start_service')->nullable();
            $table->integer('days_of_authorized_service')->nullable();
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
        Schema::dropIfExists('service_details');
    }
}
