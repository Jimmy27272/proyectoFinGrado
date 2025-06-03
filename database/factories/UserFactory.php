<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('#########'), 
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // cifra la contraseña "password" con Hash
            'remember_token' => Str::random(10), 
        ];
    }
}
