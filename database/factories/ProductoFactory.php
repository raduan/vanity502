<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
			'Descripcion' => $this->faker->name,
			'Marca' => $this->faker->name,
			'Modelo' => $this->faker->name,
			'Descuento' => $this->faker->name,
			'Precio' => $this->faker->name,
			'Existencias' => $this->faker->name,
			'categoria_id' => $this->faker->name,
			'Foto' => $this->faker->name,
        ];
    }
}
