<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintActionResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_action_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('complaint_id');
            $table->integer('action_id');
            $table->integer('action_answer_id');
            $table->string('action');
            $table->string('response');
            $table->datetime('datetime')->nullable();
            $table->string('added_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *z
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint_action_responses');
    }
}
