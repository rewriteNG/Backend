<?php

namespace Database\Seeders;

use App\Moduls\Character\CharBase;
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
        // CharValue::factory()->count(50)->create();
        User::factory()
            ->has(
                CharBase::factory()
                    ->state(
                        function (array $attributes, User $user) {
                            return ['user_id' => $user->id];
                        }
                    )
                    ->has(
                        CharValue::factory()
                            ->state(
                                function (array $attributes, CharBase $base) {
                                    return [
                                        'char_id' => $base->id,
                                        'user_id' => $base->user_id
                                    ];
                                }
                            )
                    )
                    ->count(3)
            )
            ->create(["name" => "admin"]);
    }
}
#php artisan migrate:fresh --seed