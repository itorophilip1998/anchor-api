<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskListManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_list_manager', function (Blueprint $table) {
            $table->id();
            $table->string('list_name');
            $table->string('list_type');
            $table->string('option_A')->nullable();
            $table->string('option_B')->nullable();
            $table->string('flag_A')->nullable();
            $table->string('flag_B')->nullable();
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
        Schema::dropIfExists('task_list_manager');
    }
}
