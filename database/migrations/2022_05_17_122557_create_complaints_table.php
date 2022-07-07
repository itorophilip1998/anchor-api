<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('cuid');
            $table->string('status');
            $table->date('date_reported');
            $table->string('isRoutineServiceIssue'); // true or false boolean
            $table->date('occurrence_date');
            $table->string('report_timeline');
            $table->time('complaint_time');
            $table->integer('reported_by');
            $table->string('client_relationship');
            $table->string('isSelfDirecting');
            $table->string('cluster');
            $table->string('complaint_hours');
            $table->integer('complaint_category_id');
            $table->integer('complaint_type_id');
            $table->text('description')->nullable();
            $table->string('isFileReviewed')->default('false');
            $table->string('isNurseVisit')->default('false');
            $table->integer('added_by')->default(1);
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
        Schema::dropIfExists('complaints');
    }
}
