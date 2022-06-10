<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
			'Nombres' => $this->faker->name,
			'Apellidos' => $this->faker->name,
			'Genero' => $this->faker->name,
			'Direccion' => $this->faker->name,
			'Telefono' => $this->faker->name,
			'email' => $this->faker->name,
			'FechaNacimiento' => $this->faker->name,
			'ciudades_id' => $this->faker->name,
			'DPI' => $this->faker->name,
			'user_id' => $this->faker->name,
			'Avatar' => $this->faker->name,
			'IsAdmin' => $this->faker->name,
        ];
    }
}
