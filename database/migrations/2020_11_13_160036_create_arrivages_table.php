<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrivagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivages', function (Blueprint $table) {
            $table->id();
            $table->string('arrivageLibelle');
            $table->integer('arrivagePrix');
            $table->string('arrivageQte'); 
            $table->string('arrivageDate'); 
            $table->string('MatArvg'); 
            $table->string('charge')->nullable(); 
            $table->string('description_charge')->nullable(); 
            $table->integer('statut'); 
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
        Schema::dropIfExists('arrivages');
    }
}
