<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' =>$faker->unique()->safeEmail,
                'password' => bcrypt('password@123'), // Can also be used Hash::make('password@123')
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
