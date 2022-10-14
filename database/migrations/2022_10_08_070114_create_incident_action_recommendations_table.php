<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentActionRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_action_recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id');
            $table->foreignId('incident_action_selected_id');
            $table->string('recommendation');
            $table->foreignId('clinician_recommendation_id');
            $table->string('recommended_by')->nullable();
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
        Schema::dropIfExists('incident_action_recommendations');
    }
}
