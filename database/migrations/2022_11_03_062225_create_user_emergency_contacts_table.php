<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('relationship');
            $table->string('cell_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('county')->comment('District')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('user_emergency_contacts');
    }
}
