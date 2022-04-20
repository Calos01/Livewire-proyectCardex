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
			'catalogo_id' => $this->faker->name,
			'fecha_ingreso' => $this->faker->name,
			'fecha_salida' => $this->faker->name,
			'marca' => $this->faker->name,
			'presentacion' => $this->faker->name,
			'lote' => $this->faker->name,
			'fecha_vencimiento' => $this->faker->name,
			'resp_ingreso' => $this->faker->name,
			'resp_salida' => $this->faker->name,
			'precio_sin_igv' => $this->faker->name,
			'area' => $this->faker->name,
			'cant_entrada' => $this->faker->name,
			'cant_salida' => $this->faker->name,
			'saldo' => $this->faker->name,
        ];
    }
}
