<?php

namespace Database\Factories;

use App\Models\Catalogo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CatalogoFactory extends Factory
{
    protected $model = Catalogo::class;

    public function definition()
    {
        return [
			'name_category' => $this->faker->name,
        ];
    }
}
