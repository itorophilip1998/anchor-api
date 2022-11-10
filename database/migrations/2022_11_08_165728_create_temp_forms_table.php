<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_forms', function (Blueprint $table) {
            $table->id();
            $table->string('related_sub_task_id');
            $table->string('form_id')->nullable();

            $table->string('form_item_1')->nullable();
            $table->string('form_item_2')->nullable();
            $table->string('form_item_3')->nullable();
            $table->string('form_item_4')->nullable();
            $table->string('form_item_5')->nullable();
            $table->string('form_item_6')->nullable();
            $table->string('form_item_7')->nullable();
            $table->string('form_item_8')->nullable();
            $table->string('form_item_9')->nullable();
            $table->string('form_item_10')->nullable();
            $table->string('form_item_11')->nullable();
            $table->string('form_item_12')->nullable();

            $table->boolean('form_bool_1')->nullable();
            $table->boolean('form_bool_2')->nullable();
            $table->boolean('form_bool_3')->nullable();
            $table->boolean('form_bool_4')->nullable();

            $table->date('form_date_1')->nullable();
            $table->date('form_date_2')->nullable();
            $table->date('form_date_3')->nullable();
            $table->date('form_date_4')->nullable();



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
        Schema::dropIfExists('temp_forms');
    }
}
