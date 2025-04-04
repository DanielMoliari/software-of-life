<?php

namespace App\Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Users\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(10)->create();
    }
}
