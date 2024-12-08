<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\Uuid;
use App\Models\Category;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{

    use Uuid;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('12345')
        ]);

    }
}