<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentPhaseAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_phase_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id');
            $table->foreignId('incident_phase_id');
            $table->foreignId('role_id');
            $table->string('assigned_to'); // user_id from users table
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
        Schema::dropIfExists('incident_phase_assignments');
    }
}
