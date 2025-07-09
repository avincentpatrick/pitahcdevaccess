<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterForeignKeyColumnsType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('users', function (Blueprint $table) {
            if (DB::getSchemaBuilder()->hasColumn('users', 'status_type_id')) {
                $foreignKeys = $this->listTableForeignKeys('users');
                if (in_array('users_status_type_id_foreign', $foreignKeys)) {
                    $table->dropForeign('users_status_type_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('users', 'userlevel_id')) {
                $foreignKeys = $this->listTableForeignKeys('users');
                if (in_array('users_userlevel_id_foreign', $foreignKeys)) {
                    $table->dropForeign('users_userlevel_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('users', 'office_id')) {
                $foreignKeys = $this->listTableForeignKeys('users');
                if (in_array('users_office_id_foreign', $foreignKeys)) {
                    $table->dropForeign('users_office_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('users', 'division_id')) {
                $foreignKeys = $this->listTableForeignKeys('users');
                if (in_array('users_division_id_foreign', $foreignKeys)) {
                    $table->dropForeign('users_division_id_foreign');
                }
            }
        });

        Schema::table('practitioners', function (Blueprint $table) {
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'status_type_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_status_type_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_status_type_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'application_type_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_application_type_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_application_type_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'prefix_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_prefix_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_prefix_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'suffix_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_suffix_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_suffix_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'primary_citizenship_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_primary_citizenship_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_primary_citizenship_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'secondary_citizenship_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_secondary_citizenship_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_secondary_citizenship_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'sex_type_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_sex_type_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_sex_type_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'residential_region_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_residential_region_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_residential_region_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'residential_province_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_residential_province_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_residential_province_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'residential_city_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_residential_city_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_residential_city_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'residential_barangay_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_residential_barangay_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_residential_barangay_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'business_region_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_business_region_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_business_region_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'business_province_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_business_province_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_business_province_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'business_city_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_business_city_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_business_city_id_foreign');
                }
            }
            if (DB::getSchemaBuilder()->hasColumn('practitioners', 'business_barangay_id')) {
                $foreignKeys = $this->listTableForeignKeys('practitioners');
                if (in_array('practitioners_business_barangay_id_foreign', $foreignKeys)) {
                    $table->dropForeign('practitioners_business_barangay_id_foreign');
                }
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('status_type_id')->nullable()->change();
            $table->unsignedBigInteger('userlevel_id')->nullable()->change();
            $table->unsignedBigInteger('office_id')->nullable()->change();
            $table->unsignedBigInteger('division_id')->nullable()->change();
            $table->unsignedBigInteger('updated_by')->change();

            $table->foreign('status_type_id')->references('id')->on('status_types');
            $table->foreign('userlevel_id')->references('id')->on('userlevels');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('division_id')->references('id')->on('divisions');
        });

        Schema::table('practitioners', function (Blueprint $table) {
            $table->unsignedBigInteger('status_type_id')->nullable()->change();
            $table->unsignedBigInteger('application_type_id')->nullable()->change();
            $table->unsignedBigInteger('prefix_id')->nullable()->change();
            $table->unsignedBigInteger('suffix_id')->nullable()->change();
            $table->unsignedBigInteger('citizenship_status_type_id')->nullable()->change();
            $table->unsignedBigInteger('primary_citizenship_id')->nullable()->change();
            $table->unsignedBigInteger('secondary_citizenship_id')->nullable()->change();
            $table->unsignedBigInteger('sex_type_id')->nullable()->change();
            $table->unsignedBigInteger('residential_region_id')->nullable()->change();
            $table->unsignedBigInteger('residential_province_id')->nullable()->change();
            $table->unsignedBigInteger('residential_city_id')->nullable()->change();
            $table->unsignedBigInteger('residential_barangay_id')->nullable()->change();
            $table->unsignedBigInteger('business_region_id')->nullable()->change();
            $table->unsignedBigInteger('business_province_id')->nullable()->change();
            $table->unsignedBigInteger('business_city_id')->nullable()->change();
            $table->unsignedBigInteger('business_barangay_id')->nullable()->change();
            $table->unsignedBigInteger('created_by')->nullable()->change();
            $table->unsignedBigInteger('updated_by')->nullable()->change();

            $table->foreign('status_type_id')->references('id')->on('status_types');
            $table->foreign('application_type_id')->references('id')->on('application_types');
            $table->foreign('prefix_id')->references('id')->on('prefixes');
            $table->foreign('suffix_id')->references('id')->on('suffixes');
            $table->foreign('primary_citizenship_id')->references('id')->on('countries');
            $table->foreign('secondary_citizenship_id')->references('id')->on('countries');
            $table->foreign('sex_type_id')->references('id')->on('sex_types');
            $table->foreign('residential_region_id')->references('id')->on('regions');
            $table->foreign('residential_province_id')->references('id')->on('provinces');
            $table->foreign('residential_city_id')->references('id')->on('cities');
            $table->foreign('residential_barangay_id')->references('id')->on('barangays');
            $table->foreign('business_region_id')->references('id')->on('regions');
            $table->foreign('business_province_id')->references('id')->on('provinces');
            $table->foreign('business_city_id')->references('id')->on('cities');
            $table->foreign('business_barangay_id')->references('id')->on('barangays');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['status_type_id']);
            $table->dropForeign(['userlevel_id']);
            $table->dropForeign(['office_id']);
            $table->dropForeign(['division_id']);

            $table->integer('status_type_id')->nullable()->change();
            $table->integer('userlevel_id')->nullable()->change();
            $table->integer('office_id')->nullable()->change();
            $table->integer('division_id')->nullable()->change();
            $table->integer('updated_by')->change();
        });

        Schema::table('practitioners', function (Blueprint $table) {
            $table->dropForeign(['status_type_id']);
            $table->dropForeign(['application_type_id']);
            $table->dropForeign(['prefix_id']);
            $table->dropForeign(['suffix_id']);
            $table->dropForeign(['primary_citizenship_id']);
            $table->dropForeign(['secondary_citizenship_id']);
            $table->dropForeign(['sex_type_id']);
            $table->dropForeign(['residential_region_id']);
            $table->dropForeign(['residential_province_id']);
            $table->dropForeign(['residential_city_id']);
            $table->dropForeign(['residential_barangay_id']);
            $table->dropForeign(['business_region_id']);
            $table->dropForeign(['business_province_id']);
            $table->dropForeign(['business_city_id']);
            $table->dropForeign(['business_barangay_id']);

            $table->integer('status_type_id')->nullable()->change();
            $table->integer('application_type_id')->nullable()->change();
            $table->integer('prefix_id')->nullable()->change();
            $table->integer('suffix_id')->nullable()->change();
            $table->integer('citizenship_status_type_id')->nullable()->change();
            $table->integer('primary_citizenship_id')->nullable()->change();
            $table->integer('secondary_citizenship_id')->nullable()->change();
            $table->integer('sex_type_id')->nullable()->change();
            $table->integer('residential_region_id')->nullable()->change();
            $table->integer('residential_province_id')->nullable()->change();
            $table->integer('residential_city_id')->nullable()->change();
            $table->integer('residential_barangay_id')->nullable()->change();
            $table->integer('business_region_id')->nullable()->change();
            $table->integer('business_province_id')->nullable()->change();
            $table->integer('business_city_id')->nullable()->change();
            $table->integer('business_barangay_id')->nullable()->change();
            $table->integer('created_by')->nullable()->change();
            $table->integer('updated_by')->nullable()->change();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function listTableForeignKeys($table)
    {
        $conn = Schema::getConnection()->getDoctrineSchemaManager();

        return array_map(function($key) {
            return $key->getName();
        }, $conn->listTableForeignKeys($table));
    }
}
