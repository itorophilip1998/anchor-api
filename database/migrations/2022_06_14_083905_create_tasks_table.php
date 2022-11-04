<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('title');

            $table->string('levels');
            $table->string('frequency');
            $table->string('module');
            $table->string('category');
            $table->string('user_id');

            $table->string('assigned_client_id')->nullable();
            $table->string('assigned_group_id')->nullable();
            $table->date('schedule_date');
            $table->time('schedule_time')->nullable();

            $table->string('assigned_to');
            $table->string('assigned_type');

            $table->string('reassign_reason')->nullable();
            $table->date('reassign_date')->nullable();
            $table->string('original_assigned')->nullable();
            $table->string('original_assigned_type')->nullable();

            $table->string('escalation_reason')->nullable();
            //$table->string('escalated_by')->nullable();
            //$table->date('escalation_date')->nullable();
            //$table->date('review_date')->nullable();

            $table->boolean('isClompleted')->default(0);
            $table->boolean('isReAssigned')->default(0);
            //$table->boolean('isRedo')->default(0);
            //$table->boolean('isEscalation')->default(0);
            //$table->boolean('isReviewed')->default(0);
            $table->boolean('isDeleted')->default(0);;
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
        Schema::dropIfExists('tasks');
    }
}
