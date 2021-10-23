<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatedUsuariosbandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuariosbandas', function (Blueprint $table) {
            $table->string('refresh_token')->nullable();
            $table->string('access_token')->nullable();
            $table->date("time_token")->nullable();
            $table->double("fee")->nullable();
            $table->string("public_key")->nullable();
            $table->string("number_random")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuariosbandas', function (Blueprint $table) {
            $table->dropColumn(['refresh_token' , 'access_token' , 'time_token' , 'fee' , 'number_random' ]);
        });
    }
}
