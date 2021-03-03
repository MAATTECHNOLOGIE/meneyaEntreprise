<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationPayHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_pay_historiques', function (Blueprint $table) {
            $table->id();
            $table->string('nomAgent');
            $table->string('montantPaye');
            $table->string('datePaiement');
            $table->string('typepaiement');
            $table->unsignedBigInteger('optionOpteur_id');
            $table->foreign('optionOpteur_id')->references('id')->on('operation_has_operateurs')->onDelete('cascade');
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
        Schema::dropIfExists('operation_pay_historiques');
    }
}
