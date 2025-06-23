<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensureExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensure_examinations', function (Blueprint $table) {
            $table->id();
            $table->integer('status_type_id')->nullable();
            $table->integer('practitioner_id')->nullable();
            //Licensure Exam Details
            $table->string('license_file_name')->nullable();
            $table->string('nature_of_licensure_exam')->nullable();
            $table->date('date_taken')->nullable();
            //Stamps
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('licensure_examinations');
    }
}
