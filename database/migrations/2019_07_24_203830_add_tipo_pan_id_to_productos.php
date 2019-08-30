<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoPanIdToProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
          $table->unsignedInteger('tipoPan_id')->nullable();
          $table->foreign('tipoPan_id')->references('id')->on('tipos_panes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
          $table->dropForeign(['tipoPan_id']);
          $table->dropColumn('tipoPan_id');
        });
    }
}
