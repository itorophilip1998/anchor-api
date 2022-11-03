<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('language');
            $table->jsonb('languages')->after('dob')->nullable();
            $table->string('preferred_name')->after('user_id')->nullable();
            
            $table->string('ssn')->after('dob')->nullable();
            $table->string('county')->after('zip')->nullable();
            $table->string('residence_country')->after('county')->nullable();

            $table->string('living_situation')->after('address2')->nullable(); // saving the text too, because the value could be changed, so save the id and the text
            $table->unsignedInteger('floor')->after('living_situation')->nullable();
            $table->boolean('living_alone')->default(false)->after('floor');
            $table->jsonb('living_with')->after('living_alone')->nullable()->comment('List of People Living in Home');

            $table->string('sexuality')->after('gender')->nullable();
            $table->string('racial_identity')->after('sexuality')->nullable();
            $table->string('ethnicity')->after('racial_identity')->nullable();
            $table->string('marital_status')->after('ethnicity')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('languages');
            $table->string('language')->after('dob')->nullable();

            $table->dropColumn('preferred_name');

            $table->dropColumn('ssn');
            $table->dropColumn('county');
            $table->dropColumn('residence_country');
            $table->dropColumn('racial_identity');
            $table->dropColumn('ethnicity');
            $table->dropColumn('marital_status');

            $table->dropColumn('living_situation');
            $table->dropColumn('floor');
            $table->dropColumn('living_alone');
            $table->dropColumn('living_with');

            $table->dropSoftDeletes();
        });
    }
}
