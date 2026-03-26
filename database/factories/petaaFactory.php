<?php

namespace Database\Factories;

use App\Models\petaa;
use Illuminate\Database\Eloquent\Factories\Factory;

class petaaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = petaa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titik_lokasi' => $this->faker->word,
        'y' => $this->faker->word,
        'x' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
