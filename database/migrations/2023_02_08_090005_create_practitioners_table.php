<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->integer('status_type_id')->nullable();
            $table->integer('application_type_id')->nullable();
            $table->string('photo_file_name')->nullable();
            //Personal Demographic
            $table->integer('prefix_id')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->integer('suffix_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->integer('citizenship_status_type_id')->nullable();
            $table->integer('primary_citizenship_id')->nullable();
            $table->integer('secondary_citizenship_id')->nullable();
            $table->integer('sex_type_id')->nullable();
            //Contact Information
            $table->string('landline')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('business_number')->nullable();
            $table->string('email')->nullable();
            //Residential Address
            $table->integer('residential_region_id')->nullable();
            $table->integer('residential_province_id')->nullable();
            $table->integer('residential_city_id')->nullable();
            $table->integer('residential_barangay_id')->nullable();
            $table->string('residential_address')->nullable();
            //Business Address
            $table->integer('business_region_id')->nullable();
            $table->integer('business_province_id')->nullable();
            $table->integer('business_city_id')->nullable();
            $table->integer('business_barangay_id')->nullable();
            $table->string('business_address')->nullable();
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
        Schema::dropIfExists('practitioners');
    }
}
