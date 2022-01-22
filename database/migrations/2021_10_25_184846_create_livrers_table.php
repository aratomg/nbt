<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livrers', function (Blueprint $table) {
            $table->id('id_livraison');
            $table->integer('qte');
            $table->bigInteger('id_voyage')->unsigned();
            $table->bigInteger('id_client')->unsigned();
            $table->bigInteger('id_transit')->unsigned();
            $table->string('destination');
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
        Schema::dropIfExists('livrers');
    }
}
