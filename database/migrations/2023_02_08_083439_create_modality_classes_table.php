<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalityClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modality_classes', function (Blueprint $table) {
            $table->id();
            $table->integer('status_type_id')->nullable();
            $table->integer('modality_type_id')->nullable();
            $table->integer('facility_type_id')->nullable();
            $table->integer('modality_id')->nullable();
            $table->string('modality_class_code')->nullable();
            $table->integer('initial_filipino_validity_years')->nullable();
            $table->integer('initial_foreign_validity_years')->nullable();
            $table->integer('renewal_filipino_validity_years')->nullable();
            $table->integer('renewal_foreign_validity_years')->nullable();
            $table->string('modality_class_name')->nullable();
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
        Schema::dropIfExists('modality_classes');
    }
}
