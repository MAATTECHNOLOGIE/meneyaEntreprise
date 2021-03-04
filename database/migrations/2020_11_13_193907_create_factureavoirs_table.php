<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureavoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factureavoirs', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->string('datefacturation');
            $table->string('totalht');
            $table->string('totalttc');
            $table->string('paiement');
            $table->string('session');
            $table->unsignedBigInteger('ventes_succursales_id');
            $table->foreign('ventes_succursales_id')->references('id')->on('ventes_succursales')
                                ->onDelete('cascade');


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
        Schema::dropIfExists('factureavoirs');
    }
}
