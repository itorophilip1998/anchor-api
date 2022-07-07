<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('status');
            $table->boolean('in_service_status')->nullable();
            $table->boolean('covid_vaccine_status')->nullable();
            $table->boolean('flu_vaccine_status')->nullable();
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
        Schema::dropIfExists('medical_statuses');
    }
}
