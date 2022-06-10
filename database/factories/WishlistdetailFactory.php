<?php

namespace Database\Factories;

use App\Models\Wishlistdetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WishlistdetailFactory extends Factory
{
    protected $model = Wishlistdetail::class;

    public function definition()
    {
        return [
			'cliente_id' => $this->faker->name,
			'producto_id' => $this->faker->name,
			'wishlist_id' => $this->faker->name,
        ];
    }
}
