<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('status_type_id')->nullable();
            $table->integer('application_type_id')->nullable();
            //Name of Facility
            $table->string('facility_name')->nullable();
            //Contact Head of Office
            $table->integer('prefix_id')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->integer('suffix_id')->nullable();
            $table->integer('citizenship_id')->nullable();
            $table->integer('sex_type_id')->nullable();
            //Filipino Physician
            $table->integer('foreign_managed_status_type_id')->nullable();
            $table->integer('filipino_physician_prefix_id')->nullable();
            $table->string('filipino_physician_last_name')->nullable();
            $table->string('filipino_physician_first_name')->nullable();
            $table->string('filipino_physician_middle_name')->nullable();
            $table->integer('filipino_physician_suffix_id')->nullable();
            $table->string('filipino_physician_prc_id_number')->nullable();
            $table->date('filipino_physician_prc_expiration_date')->nullable();
            
            //Contact Information
            $table->string('landline')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('business_number')->nullable();
            $table->string('email')->nullable();
            //Business Address
            $table->integer('region_id')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('barangay_id')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('facilities');
    }
}
