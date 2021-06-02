<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rental::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id'       =>  Customer::factory(),
            'vehicle_id'        =>  Vehicle::factory(),
            'vehicle_checkout'  =>  now()->toDateTimeString(),
            'vehicle_initial_condition'     =>  $this->faker->sentence(),
            'rental_status'     =>  'rented'
        ];
    }
}
