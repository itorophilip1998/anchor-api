<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCoordIdInClientCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_coordinators', function (Blueprint $table) {
            $table->foreignId('client_id')->change();
            $table->renameColumn('coord_id', 'coordinator_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_coordinators', function (Blueprint $table) {
            $table->string('client_id')->change();
            $table->renameColumn('coordinator_id', 'coord_id');
        });
    }
}
