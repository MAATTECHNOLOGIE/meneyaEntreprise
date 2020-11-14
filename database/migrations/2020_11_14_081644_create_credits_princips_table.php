<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsPrincipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits_princips', function (Blueprint $table) {
            $table->id();
            $table->string('creditEcheance');
            $table->string('creditMontant');
            $table->string('creditStatut');
            $table->string('creditDate');
            $table->string('description');
            $table->unsignedBigInteger('princip_factu_avoirs_id');
            $table->foreign('princip_factu_avoirs_id')->references('id')
                    ->on('princip_factu_avoirs')->onDelete('cascade');
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
        Schema::dropIfExists('credits_princips');
    }
}
