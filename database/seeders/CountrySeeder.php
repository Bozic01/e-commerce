<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usaStates = [
            "AL" => 'Alabama',
            "AK" => 'Alaska',
            "AZ" => 'Arizona',
            "AR" => 'Arkansas',
            "CA" => 'California',
        ];
        $countries = [
            ['code' => 'aut', 'name' => 'Austria', 'states' => null],
            ['code' => 'bel', 'name' => 'Belgium', 'states' => null],
            ['code' => 'bih', 'name' => 'Bosnia and Herzegovina', 'states' => null],
            ['code' => 'ser', 'name' => 'Serbia', 'states' => null],
            ['code' => 'pol', 'name' => 'Poland', 'states' => null],
            ['code' => 'slo', 'name' => 'Slovenia', 'states' => null],
            ['code' => 'ger', 'name' => 'Germany', 'states' => null],
            ['code' => 'usa', 'name' => 'United States of America', 'states' => json_encode($usaStates)],
        ];
        Country::insert($countries);
    }
}
