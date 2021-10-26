<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_logs', function (Blueprint $table) {
            $table->id();
            $table->string('id_log_mp');
            $table->double('fee_mto');
            $table->double('fixed_value');
            $table->double('unit_price');
            $table->integer('quantity');
            $table->double('fee_total');
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
        Schema::dropIfExists('marketplace_logs');
    }
}
