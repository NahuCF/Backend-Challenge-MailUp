<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        $this->call([
            ProductSeeder::class,
            UserSeeder::class,
        ]);

        if(app()->isLocal()) {
            $this->command->alert(
                'Your API key is: ' .
                User::first()->createToken('auth-token')->plainTextToken
            );
        }
    }
}
