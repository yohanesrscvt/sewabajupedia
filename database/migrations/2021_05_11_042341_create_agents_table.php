<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->string('AgentID');
            $table->string('AgentNama');
            $table->string('AgentEmail')->unique();
            $table->string('AgentPassword');
            $table->string('AgentPhone');
            $table->integer('AgentSaldo');
            $table->string('AgentPicturePath');
            $table->string('AgentAlamat');
            $table->primary('AgentID');
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
        Schema::dropIfExists('agents');
    }
}
