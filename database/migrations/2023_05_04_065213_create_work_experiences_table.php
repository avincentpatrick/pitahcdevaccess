<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('status_type_id')->nullable();
            $table->integer('practitioner_id')->nullable();
            $table->integer('work_modality_id')->nullable();
            //Latest Work Experience
            $table->string('nature_of_practice')->nullable();
            $table->string('facility_name')->nullable();
            $table->date('work_inclusive_date_from')->nullable();
            $table->date('work_inclusive_date_to')->nullable();
            $table->integer('work_inclusive_date_to_present')->nullable();
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
        Schema::dropIfExists('work_experiences');
    }
}
