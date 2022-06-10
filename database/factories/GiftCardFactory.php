<?php

namespace Database\Factories;

use App\Models\GiftCard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GiftCardFactory extends Factory
{
    protected $model = GiftCard::class;

    public function definition()
    {
        return [
			'Monto' => $this->faker->name,
			'clientes_id' => $this->faker->name,
			'CODE' => $this->faker->name,
			'Porcentual' => $this->faker->name,
			'reclaimed_at' => $this->faker->name,
        ];
    }
}
