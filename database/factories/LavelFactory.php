<?php

namespace Database\Factories;

use App\Models\Lavel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lavel>
 */
class LavelFactory extends Factory
{

    protected $model = Lavel::class;
    public function  definition()
    {
        return [
            'title' => $this->faker->sentence,
            "description" => $this->faker->paragraph
        ];
    }
}
