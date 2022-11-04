<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProxiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_proxies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('proxy')->nullable()
                    ->comment('guardian, health proxy, contact information');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('relationship')->nullable()
                    ->comment('Relationship with the Client');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('client_proxies');
    }
}
