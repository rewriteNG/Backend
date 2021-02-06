<?php

namespace Database\Seeders;

use App\Moduls\Character\CharValue;
use App\Moduls\User;
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
        CharValue::factory()->count(50)->create();
    }
}
#php artisan migrate:fresh --seed