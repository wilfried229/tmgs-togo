<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecettesToRecettesTrafics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recettes_trafics', function (Blueprint $table) {
            //
            $table->string('tricycle');
            $table->string('roues2');
            $table->string('pl_2essieux');
            $table->string('pl_3essieux');
            $table->string('pl_4essieux');
            $table->string('pl_5essieux');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recettes_trafics', function (Blueprint $table) {
            //
        });
    }
}
