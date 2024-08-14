<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LoginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;
    public function definition(): array
    {
        return [
            'name' => 'Isaiah',
            'email' => 'kudastech@gmail.com',
            'password' => Hash::make('12345678')
        ];
    }
}
