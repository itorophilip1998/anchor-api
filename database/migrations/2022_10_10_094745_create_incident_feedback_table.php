<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id');
            $table->string('feedback_hcw');
            $table->string('feedback_nurse');
            $table->string('feedback_agency');
            $table->string('feedback_referral_response')->comment('If the agency will be referred');
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
        Schema::dropIfExists('incident_feedback');
    }
}
