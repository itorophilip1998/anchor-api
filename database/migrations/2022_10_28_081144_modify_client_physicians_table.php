<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyClientPhysiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_physicians', function (Blueprint $table) {
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('street')->after('phone')->nullable();
            $table->string('city')->after('street')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('zip')->after('state')->nullable();
            $table->string('county')->after('zip')->nullable()->comment('District');
            $table->string('country')->after('zip')->nullable();
            $table->string('company_name')->after('country')->nullable();
            $table->string('physician_number')->after('last_name')->nullable();
            $table->string('assistant_number')->after('company_name')->nullable();
            $table->string('office_number')->after('assistant_number')->nullable();
            $table->string('pager_number')->after('office_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_physicians', function (Blueprint $table) {
            $table->string('first_name')->nullable(false)->change();
            $table->string('last_name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->dropColumn('street');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip');
            $table->dropColumn('county');
            $table->dropColumn('country');
            $table->dropColumn('company_name');
            $table->dropColumn('assistant_number');
            $table->dropColumn('office_number');
            $table->dropColumn('pager_number');
            $table->dropColumn('physician_number');
        });
    }
}
