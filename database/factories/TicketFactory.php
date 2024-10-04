<?php

namespace Database\Factories;

use App\Models\Departament;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'departament_id' => Departament::pluck('id')->random(),
            'title' => $this->faker->sentence,
            'observation' => $this->faker->paragraph,
            'status' => 'open',
            'solution' => null,
            'note' => null,
        ];
    }
}
