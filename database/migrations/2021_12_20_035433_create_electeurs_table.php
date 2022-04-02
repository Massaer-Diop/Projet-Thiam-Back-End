<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElecteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_electeur');
            $table->string('prenom_electeur');
            $table->unsignedBigInteger('num_cni')->unique();
            $table->unsignedBigInteger('num_electeur')->nullable();
            $table->string('adresse');
            $table->string('annee_naissance');
            $table->boolean('a_vote');
            $table->foreignId('commune_id')->constrained();
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
        Schema::dropIfExists('electeurs');
    }
}
