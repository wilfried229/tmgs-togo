<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointPassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_passages', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedInteger('voie_id');
            $table->unsignedInteger('site_id');
            $table->enum('vacation', [
                env('TYPE_VACATION_06H'),
                env('TYPE_VACATION_14H'),
                env('TYPE_VACATION_20H'),
            ]);
            $table->enum('type_passage', [
                env('TYPE_PASSAGE_ONLINE'),
                env('TYPE_PASSAGE_OFFLINE'),
            ]);
            $table->integer('somme_total_trafic');
            $table->integer('somme_total_recette_equialente');
            $table->longText('paiement_espece_defaut_provision');
            $table->longText('observations');

            $table->unsignedInteger('users_id');
            $table->timestamps();
            //$table->foreign('users_id')->references('id')->on('users');
            //$table->foreign('site_id')->references('id')->on('site');
            //$table->foreign('voie_id')->references('id')->on('voie');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_passages');
    }
}
