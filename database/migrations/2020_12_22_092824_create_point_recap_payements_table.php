<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointRecapPayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_recap_payements', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('site_id');
            $table->string('trafic_espace');
            $table->string('recettes_espace');
            $table->string('trafic_gate');
            $table->string('recettes_gate');
            $table->string('trafic_uhf');
            $table->string('recettes_uhf');
            $table->string('trafic_total');
            $table->string('recettes_total');
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
        Schema::dropIfExists('point_recap_payements');
    }
}
