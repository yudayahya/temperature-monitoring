<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        foreach (range(1, 4) as $index) {
            DB::table('fish_pools')->insert([
                'name' => 'Kolam ' . $index,
                'color' => $faker->rgbaCssColor(),
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);
        }

        foreach (range(1, 30) as $index) {
            DB::table('temperatures')->insert([
                'fish_pool_id' => 1,
                'temperature' => $faker->numberBetween(-10, 30),
                'ph' => $faker->numberBetween(1, 14),
                'time' => new DateTime('+' . $index . ' minutes'),
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);

            DB::table('temperatures')->insert([
                'fish_pool_id' => 2,
                'temperature' => $faker->numberBetween(-10, 30),
                'ph' => $faker->numberBetween(1, 14),
                'time' => new DateTime('+' . $index . ' minutes'),
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);

            DB::table('temperatures')->insert([
                'fish_pool_id' => 3,
                'temperature' => $faker->numberBetween(-10, 30),
                'ph' => $faker->numberBetween(1, 14),
                'time' => new DateTime('+' . $index . ' minutes'),
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);

            DB::table('temperatures')->insert([
                'fish_pool_id' => 4,
                'temperature' => $faker->numberBetween(-10, 30),
                'ph' => $faker->numberBetween(1, 14),
                'time' => new DateTime('+' . $index . ' minutes'),
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);
        }
    }
}
