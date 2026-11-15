<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->sentence(),
            'description'=>$this->faker->text()
        ];
    }
    function completed(){
        return $this->state(function(array $attributes){
            return[
                'status'=> true
            ];
        });
    }
    function uncompleted(){
        return $this->state(function(array $attributes){
            return[
                'status'=> false
            ];
        });
    }
    function tomorrow(){
        return $this->state(function(array $attributes){
            return[
                'due_date'=> now()->addDay()
            ];
        });
    }
    function priority($level=1){
        return $this->state(function(array $attributes) use ($level){
            return[
                'priority'=> $level
            ];
        });
    }
}
