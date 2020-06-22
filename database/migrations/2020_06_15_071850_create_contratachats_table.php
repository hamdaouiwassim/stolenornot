<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratachatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratachats', function (Blueprint $table) {
            $table->id();
            $table->string("document");
            $table->integer("idacheteur");
            $table->integer("idvendeur");
            $table->integer("idtelephone");
            $table->string("etat");
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
        Schema::dropIfExists('contratachats');
    }
}
