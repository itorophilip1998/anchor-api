<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('iuid');
            $table->integer('status');
            $table->integer('client_id');
            $table->date('date');
            $table->enum('timeline', ['Immediately', 'Within the homecare worker shift', 'Within 24 hours']); // try using enum
            $table->time('time');
            $table->integer('added_by');
            $table->string('client_relation');
            $table->string('hours_of_incident');
            $table->enum('incident_level', ['Very High Risk', 'High Risk', 'Medium Risk', 'Low Risk']);
            $table->integer('coord_involved')->nullable();
            $table->integer('nurse_involved')->nullable();
            $table->integer('incident_type');
            $table->integer('incident_type_category_id');
            $table->string('resolution_timeline');
            $table->boolean('isInsurance')->default(0);
            $table->boolean('hasActivity')->default(0);
            $table->boolean('hasFollowup')->default(0);
            $table->boolean('insurance_isNotified')->default(0);
            $table->integer('insurance_company_id')->nullable();
            $table->date('insurance_notified_date')->nullable();
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
        Schema::dropIfExists('incidents');
    }
}
