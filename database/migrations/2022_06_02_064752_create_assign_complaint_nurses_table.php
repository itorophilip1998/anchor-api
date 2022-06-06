<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignComplaintNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_complaint_nurses', function (Blueprint $table) {
            $table->id();
            $table->integer('complaint_id');
            $table->integer('user_id');
            $table->boolean('nurse_visit')->default(0);
            $table->boolean('file_review')->default(0);
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
        Schema::dropIfExists('assign_complaint_nurses');
    }
}
