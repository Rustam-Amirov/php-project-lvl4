<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/** 
* @property string $name
*/
class TaskStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
