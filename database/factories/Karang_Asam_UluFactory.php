<?php

namespace Database\Factories;

use App\Models\Karang_Asam_Ulu;
use Illuminate\Database\Eloquent\Factories\Factory;

class Karang_Asam_UluFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Karang_Asam_Ulu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nama_lokasi' => $this->faker->word,
        'koordinat_poligon' => $this->faker->word,
        'warna_poligon' => $this->faker->word,
        'deskripsi' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
