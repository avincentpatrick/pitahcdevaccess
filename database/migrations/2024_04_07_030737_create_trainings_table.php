<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('status_type_id')->nullable();
            $table->integer('practitioner_id')->nullable();
            $table->integer('training_modality_id')->nullable();
            //Licensure Exam Details
            $table->string('training_certificate_file_name')->nullable();
            $table->string('title_of_training')->nullable();
            $table->integer('number_of_hours')->nullable();
            $table->string('conducted_by')->nullable();
            $table->string('certificate_obtained')->nullable();
            $table->date('training_inclusive_date_from')->nullable();
            $table->date('training_inclusive_date_to')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
