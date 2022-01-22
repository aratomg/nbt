<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acheters', function (Blueprint $table) {
            $table->id('id_achat');
            $table->integer('qte');
            $table->date('date_achat');
            $table->bigInteger('id_piece')->unsigned();
            $table->bigInteger('id_fournisseur')->unsigned();
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
        Schema::dropIfExists('acheters');
    }
}
