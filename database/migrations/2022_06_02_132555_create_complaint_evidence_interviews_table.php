<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintEvidenceInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('complaint_evidence_interviews', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->datetime('date');
            $table->string('telephone');
            $table->integer('type_id');
            $table->string('address')->nullable();
            $table->string('conclusion')->nullable();
            $table->string('comments')->nullable();
            $table->string('file')->nullable();
            $table->string('frequent_occurrance')->nullable();
            $table->string('position')->nullable();
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
        Schema::dropIfExists('complaint_evidence_interviews');
    }
}
