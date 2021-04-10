<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init_options = [
            "home_village" => ['Konohagakure', 'Amegakure', 'Iwagakure', 'Sunagakure', 'Kusagakure', 'Kumogakure', 'Takigakure', 'Kirigakure', 'Otogakure'],
            "gender" => ['männlich', 'weiblich', 'divers'],
            "chakra_color" => ["Blau", "Schwarz", "Weiß", "Gelb", "Rot", "Grün", "Violett", "Orange"]
        ];
        foreach ($init_options as $option => $value_array) {
            foreach ($value_array as $value) {
                DB::table('optionsets')->insert([
                    'category' => $option,
                    'value' => $value,
                ]);
            }
        }
    }
}
