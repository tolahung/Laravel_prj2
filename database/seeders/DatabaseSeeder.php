<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'adminCheck'=>1,
            'password'=>Hash::make('admin123'),
            'address'=>'PC'
        ]);

        $this->call(ProductSeeder::class);
    }
}
