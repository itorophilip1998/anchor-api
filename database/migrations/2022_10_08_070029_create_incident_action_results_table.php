<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentActionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_action_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id');
            $table->foreignId('incident_action_selected_id');
            $table->foreignId('result_id')->references('id')->on('actions');
            $table->string('result');
            $table->mediumText('comments')->nullable();
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
        Schema::dropIfExists('incident_action_results');
    }
}
