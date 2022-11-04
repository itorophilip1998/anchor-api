<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSubItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_sub_items', function (Blueprint $table) {
            $table->id();
            //$table->string('linked_template_id');   //task_tempates - id
            $table->string('linked_task_item_id');    //tasks_items - id

            $table->string('title');
            $table->string('status');

            $table->string('form_items')->nullable();
            $table->string('form_response')->nullable();

            $table->string('reassign_by')->nullable();
            $table->string('reassign_reason')->nullable();
            $table->date('review_date')->nullable();

            $table->string('assigned_to');
            $table->string('assigned_type');

            $table->string('original_assigned')->nullable();
            $table->string('original_type')->nullable();

            $table->string('escalated_to')->nullable();
            $table->string('escalated_by')->nullable();
            $table->date('escalation_date')->nullable();
            $table->string('escalation_reason')->nullable();

            $table->string('redo_reason')->nullable();
            $table->boolean('isRedo')->default(0);

            $table->boolean('isReAssigned')->default(0);
            $table->boolean('isEscalation')->default(0);
            $table->boolean('isReviewed')->default(0);
            $table->boolean('isClosed')->default(0);
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
        Schema::dropIfExists('task_sub_items');
    }
}
