<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->integer('practitioner_id')->nullable();
            $table->integer('status_type_id')->nullable();
            $table->integer('application_type_id')->nullable();
            $table->integer('application_sub_type_id')->nullable();
            $table->string('certification_code')->nullable();
            $table->string('practitioner_certificate_file')->nullable();
            $table->integer('certificate_availability_id')->nullable();
            $table->integer('modality_class_id')->nullable();
            $table->date('entry_date')->nullable();
            $table->date('application_date')->nullable();
            $table->date('expiration_date')->nullable();
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
        Schema::dropIfExists('certifications');
    }
}
