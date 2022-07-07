<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_recommendations', function (Blueprint $table) {
            $table->id();
            $table->integer('incident_id');
            $table->integer('activity_id');
            $table->integer('recommendation_id');
            $table->string('recommendation');
            $table->datetime('datetime')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('selected_recommendations');
    }
}
