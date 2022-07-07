<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintIntervieqResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_intervieq_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id');
            $table->integer('answer_id');
            $table->string('question');
            $table->string('answer');
            $table->integer('added_by');
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
        Schema::dropIfExists('complaint_intervieq_responses');
    }
}
