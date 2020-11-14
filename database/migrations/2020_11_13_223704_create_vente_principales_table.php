<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentePrincipalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_principales', function (Blueprint $table) {
            $table->id();
            $table->string('NumVente');
            $table->integer('qte');
            $table->integer('prix');
            $table->string('dateV');
            $table->string('cout_achat_total');
            $table->string('prix_vente_total');
            $table->integer('mg_benef_brute');
            $table->integer('mg_benef_rel');
            $table->integer('livraison');
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')->references('id')->on('clients')
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
        Schema::dropIfExists('vente_principales');
    }
}
