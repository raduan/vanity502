<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
			'Descripcion' => $this->faker->name,
			'Foto' => $this->faker->name,
        ];
    }
}
