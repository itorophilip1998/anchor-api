<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_items', function (Blueprint $table) {
            $table->id();
            $table->string('linked_template_id');   //task_tempate - id
            $table->string('linked_task_id');       //tasks - id

            $table->string('title');

            //$table->string('form_items')->nullable();
            //$table->string('form_response')->nullable();

            $table->string('reassign_by')->nullable();
            $table->string('reassign_reason')->nullable();
            //$table->string('escalation_reason')->nullable();

            $table->string('assigned_to');
            $table->string('assigned_type');

            $table->string('original_assigned_to')->nullable();
            $table->string('original_assigned_type')->nullable();

            // $table->string('escalated_to')->nullable();
            // $table->string('escalated_by')->nullable();
            // $table->date('escalation_date')->nullable();

            // $table->date('review_date')->nullable();

            $table->date('reassign_date')->nullable();
            //$table->time('time')->nullable();

            //$table->boolean('isRedo')->default(0);
            //$table->string('redo_reason')->nullable();

            $table->boolean('isReAssigned')->default(0);
            //$table->boolean('isEscalation')->default(0);
            //$table->boolean('isReviewed')->default(0);
            //table->boolean('isClosed')->default(0);
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
        Schema::dropIfExists('task_items');
    }
}
