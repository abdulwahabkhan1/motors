<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_year'    =>  $this->faker->year(),
            'make'          =>  $this->faker->randomElement([
                'Toyota', 'Honda', 'Suzuki', 'Tesla'
            ]),
            'model'         =>  $this->faker->word(),
            'transmission'  =>  $this->faker->randomElement([
                'Automatic', 'Manual'
            ]),
            'body'      =>  $this->faker->randomElement([
                'Sedan', 'Hatch', 'SUV'
            ]),
            'color'     =>  $this->faker->colorName(),
        ];
    }
}
