<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointPassageManuelleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_passage_manuelle', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->unsignedInteger('voie_id');
            $table->unsignedInteger('site_id');

            $table->enum('vacation', [
                env('TYPE_VACATION_06H'),
                env('TYPE_VACATION_14H'),
                env('TYPE_VACATION_20H'),
            ]);
            $table->string('identite_percepteur');
            $table->text('point_traf_info_mode_manuel');
            $table->string('solde_recette_info_mode_manuel');
            $table->time('heure_debutComptage');
            $table->time('heure_finComptage');
            $table->text('trafic_compteManu');
            $table->text('equipRecette');
            $table->text('etaDonne_taficInformatiser');
            $table->text('etaDonne_recetteInformatiser');
            $table->text('etaFinal_recetteInformatiser');
            $table->text('etaFinal_taficInformatiser');
            $table->text('observation');
            $table->unsignedInteger('users_id');
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('point_passage_manuelle');
    }
}
