<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_services', function (Blueprint $table) {
            $table->id();
            $table->integer('referral_id');
            $table->integer('service_id');
            $table->string('terms_of_care');
            $table->boolean('isVeteran');
            $table->boolean('honorableDischarge');
            $table->boolean('isDisabled');
            $table->string('paymentPlan');
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
        Schema::dropIfExists('referral_services');
    }
}
