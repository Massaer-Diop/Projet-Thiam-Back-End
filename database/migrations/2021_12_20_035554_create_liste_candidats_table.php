<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom_candidat');
            $table->string('prenom_candidat');
            $table->string('parti_politique');
            $table->string('image')->nullable();
            $table->text('programme');
            $table->unsignedBigInteger('num_cni_candidat')->unique();
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
        Schema::dropIfExists('liste_candidats');
    }
}
