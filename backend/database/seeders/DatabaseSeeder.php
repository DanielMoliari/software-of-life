<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Users\Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
        ]);
    }
}