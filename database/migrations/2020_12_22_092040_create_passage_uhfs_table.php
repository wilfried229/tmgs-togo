<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassageUhfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passage_uhfs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedInteger('voie_id');
            $table->unsignedInteger('site_id');
            $table->enum('vacation', [
                env('TYPE_VACATION_06H'),
                env('TYPE_VACATION_14H'),
                env('TYPE_VACATION_20H'),
            ]);
            $table->integer('passage_uhf');
            $table->integer('somme_total_trafic');
            $table->integer('somme_total_recette_equialente');
            $table->string('paiement_espece_defaut_provision');
            $table->string('paiement_espece_dysfon');


            $table->longText('observations');

            $table->unsignedInteger('users_id');
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
        Schema::dropIfExists('passage_uhfs');
    }
}
