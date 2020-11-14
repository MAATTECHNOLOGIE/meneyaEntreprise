<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortieOpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_ops', function (Blueprint $table) {
            $table->id();
            $table->string('matSortie');
            $table->string('libelleSortie');
            $table->integer('montantS');
            $table->integer('quantiteS');
            $table->string('dateSortie');
            $table->string('charges');
            $table->unsignedBigInteger('operationsOperateurs_id');
            $table->foreign('operationsOperateurs_id')
            ->references('id')->on('operations_has_operateurs')->onDelete('cascade');

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
        Schema::dropIfExists('sortie_ops');
    }
}
