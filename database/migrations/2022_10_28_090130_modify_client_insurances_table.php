<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyClientInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_insurances', function (Blueprint $table) {
            $table->foreignId('client_id')->change();
            $table->jsonb('insurance_type')->after('client_id')->nullable(); // multiselect, reason for jsonb to store as array
            $table->string('insurance_number')->after('insurance_type')->nullable();
            $table->string('insurance_provider')->after('insurance_number')->nullable();
            $table->string('program_name')->after('insurance_provider')->comment('Payor')->nullable();
            $table->boolean('authorization_received')->default(false)->after('program_name');
            $table->date('authorization_start_date')->after('authorization_received')->nullable();
            $table->date('authorization_end_date')->after('authorization_start_date')->nullable();
            $table->boolean('m11q_required')->default(false)->after('authorization_end_date');
            $table->string('m11q_on_file')->nullable()->after('m11q_required')->comment('Yes, No, Not Applicable');
            $table->date('m11q_on_file_date')->nullable()->after('m11q_on_file');
            $table->date('care_start_date')->after('m11q_on_file_date')->nullable();
            $table->jsonb('authorized_service_hours')->after('care_start_date')->nullable();
            $table->jsonb('authorized_service_days')->after('authorized_service_hours')->nullable();
            $table->date('certification_start_date')->after('authorized_service_days')->nullable();
            $table->date('certification_end_date')->after('certification_start_date')->nullable();
            $table->jsonb('pharmacy')->after('certification_end_date')->comment('Pharmacy Information which may include: name, phone, address etc')->nullable();
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
        Schema::table('client_insurances', function (Blueprint $table) {
            $table->string('client_id')->change();
            $table->dropColumn('insurance_type');
            $table->dropColumn('insurance_number');
            $table->dropColumn('insurance_provider');
            $table->dropColumn('program_name');
            $table->dropColumn('authorization_received');
            $table->dropColumn('authorization_start_date');
            $table->dropColumn('authorization_end_date');
            $table->dropColumn('m11q_required');
            $table->dropColumn('m11q_on_file');
            $table->dropColumn('m11q_on_file_date');
            $table->dropColumn('care_start_date');
            $table->dropColumn('authorized_service_hours');
            $table->dropColumn('authorized_service_days');
            $table->dropColumn('certification_start_date');
            $table->dropColumn('certification_end_date');
            $table->dropColumn('pharmacy');
            $table->dropSoftDeletes();
        });
    }
}
