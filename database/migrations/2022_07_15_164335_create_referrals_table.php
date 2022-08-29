<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->datetime('contact_date');
            $table->integer('referral_type_id');
            $table->integer('referral_source_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('medicaid_number')->nullable();
            $table->string('medicare_number')->nullable();
            $table->string('client_phonenumber');
            $table->string('client_address');
            $table->date('client_dob');
            $table->string('client_language');
            $table->boolean('hasMedicaid');
            $table->boolean('hasMedicare');
            $table->boolean('hasService');
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
        Schema::dropIfExists('referrals');
    }
}
