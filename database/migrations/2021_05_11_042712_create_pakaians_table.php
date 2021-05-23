<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakaians', function (Blueprint $table) {
            $table->string('PakaianID');
            $table->string('AgentID');
            $table->string('KategoriID');
            $table->string('SizeID');
            $table->string('PakaianNama');
            $table->string('PakaianHarga');
            $table->string('PakaianGambar');
            $table->string('PakaianDeskripsi');
            $table->integer('StockQty');
            $table->float('PakaianRating',2,1);

            $table->primary('PakaianID');
            $table->foreign('AgentID')->references('AgentID')->on('agents');
            $table->foreign('KategoriID')->references('KategoriID')->on('kategoris');
            $table->foreign('SizeID')->references('SizeID')->on('sizes');
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
        Schema::dropIfExists('pakaians');
    }
}
