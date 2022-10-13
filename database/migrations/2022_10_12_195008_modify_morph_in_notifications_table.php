<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMorphInNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) { 
            // this is because the id is strring, and uuidMorphs is char(36)
            // so i had to seperate, and not use morphs
            $table->string('notifiable_id');
            $table->string('notifiable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('notifiable_id');
            $table->dropColumn('notifiable_type');
        });
    }
}
