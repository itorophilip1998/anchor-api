<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id');
            $table->foreignId('incident_case_type_id');
            $table->foreignId('injury_id');
            $table->foreignId('incident_location_id');
            $table->mediumText('description');
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
        Schema::dropIfExists('incident_analyses');
    }
}
