<?php

namespace App\Modules\Users\Database\Factories;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName(),
            'sobrenome' => $this->faker->lastName(),
        ];
    }
}