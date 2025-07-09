<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        // $this->call(BarangaysTableSeeder::class);
        // $this->call(CitiesTableSeeder::class);
        // $this->call(CountriesTableSeeder::class);
        // $this->call(DivisionsTableSeeder::class);
        // $this->call(FacilityTypesTableSeeder::class);
        // $this->call(LguTypesTableSeeder::class);
        // $this->call(ModalitiesTableSeeder::class);
        // $this->call(ModalityClassesTableSeeder::class);
        // $this->call(ModalityTypesTableSeeder::class);
        // $this->call(OfficesTableSeeder::class);
        // $this->call(PrefixesTableSeeder::class);
        // $this->call(ProvincesTableSeeder::class);
        // $this->call(RegionsTableSeeder::class);
        // $this->call(ResponsesTableSeeder::class);
        // $this->call(SexTypesTableSeeder::class);
        // $this->call(StatusTypesTableSeeder::class);
        // $this->call(SuffixesTableSeeder::class);
        // $this->call(UserlevelsTableSeeder::class);
        // $this->call(SubUserlevelsTableSeeder::class);
        $this->call(ApplicationTypesTableSeeder::class);
        $this->call(ApplicationSubTypesTableSeeder::class);
        $this->call(AvailabilityTypesTableSeeder::class);
    }
}
