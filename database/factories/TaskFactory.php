<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskStatus;
use App\Models\User;

/**
 * @property string $name
 * @property integer $statud_id
 * @property string $description
 * @property integer $created_by_id
 * @property integer $assigned_to_id
*/
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'status_id' => TaskStatus::factory()->create()->id,
            'created_by_id' => $user->id,
            'assigned_to_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
