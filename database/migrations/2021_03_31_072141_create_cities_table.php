<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('region_id')->nullable();
            $table->integer('province_id')->nullable();
            $table->string('city_name')->nullable();
            $table->string('city_name_lower')->nullable();
            $table->string('geographic_level')->nullable();
            $table->integer('uhc_is_id')->nullable();
            $table->string('city_class')->nullable();
            $table->string('uhc_class')->nullable();
            $table->string('income_class')->nullable();
            $table->integer('polulation')->nullable();
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
        Schema::dropIfExists('cities');
    }
}
