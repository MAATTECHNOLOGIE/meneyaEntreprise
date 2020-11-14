<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsHasOperateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations_has_operateurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operations_id');
            $table->foreign('operations_id')->references('id')->on('operations')
                                            ->onDelete('cascade');
            $table->unsignedBigInteger('operateurs_id');
            $table->foreign('operateurs_id')->references('id')->on('operateurs')
                                            ->onDelete('cascade');
            $table->string('montant');
            $table->string('montantrestant');
            $table->string('date');
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
        Schema::dropIfExists('operations_has_operateurs');
    }
}
