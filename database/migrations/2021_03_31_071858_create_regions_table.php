<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->integer('sequence_no')->nullable();
            $table->string('region_name')->nullable();
            $table->string('region_name_no')->nullable();
            $table->integer('population')->nullable();
            $table->string('regional_director_name')->nullable();
            $table->string('regional_office_address')->nullable();
            $table->string('regional_director_designation')->nullable();
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
        Schema::dropIfExists('regions');
    }
}
