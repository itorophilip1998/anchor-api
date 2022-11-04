<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('title', 'prefix');
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('preferred_name')->after('middle_name')->nullable();
            $table->string('suffix')->after('last_name')->nullable();
            $table->foreignId('living_situation_id')->after('residence_country')->nullable(); 
            $table->string('living_situation')->after('living_situation_id')->nullable(); // saving the text too, because the value could be changed, so save the id and the text
            $table->unsignedInteger('floor')->after('living_situation')->nullable();
            $table->boolean('living_alone')->default(false)->after('floor');
            $table->jsonb('living_with')->after('living_alone')->nullable()->comment('List of People Living in Home');
            $table->boolean('elevator')->default(false)->after('floor');
            $table->renameColumn('address1', 'address');
            $table->dropColumn('address2');
            $table->string('county')->after('zip')->nullable();
            $table->string('client_id_number')->after('cell_phone')->nullable()->comment('Identity Number');
            $table->string('ssn')->after('client_id_number')->nullable()->comment('Social Security Number');
            $table->string('primary_hospital')->after('ssn')->nullable();
            $table->string('closest_hospital')->after('primary_hospital')->nullable();
            $table->jsonb('spoken_languages')->after('residence_country')->nullable();
            $table->jsonb('preferred_languages')->after('spoken_languages')->nullable();
            $table->string('racial_identity')->after('preferred_languages')->nullable();
            $table->string('ethnicity')->after('racial_identity')->nullable();
            $table->string('marital_status')->after('ethnicity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('prefix', 'title');
            $table->dropColumn('middle_name');
            $table->dropColumn('preferred_name');
            $table->dropColumn('suffix');
            $table->dropColumn('living_situation_id'); 
            $table->dropColumn('living_situation');
            $table->dropColumn('floor');
            $table->dropColumn('living_alone');
            $table->dropColumn('living_with');
            $table->dropColumn('elevator');
            $table->renameColumn('address', 'address1');
            $table->string('address2')->nullable()->after('address');
            $table->dropColumn('county');
            $table->dropColumn('client_id_number');
            $table->dropColumn('ssn');
            $table->dropColumn('primary_hospital');
            $table->dropColumn('closest_hospital');
            $table->dropColumn('spoken_languages');
            $table->dropColumn('preferred_languages');
            $table->dropColumn('racial_identity');
            $table->dropColumn('ethnicity');
            $table->dropColumn('marital_status');
        });
    }
}
