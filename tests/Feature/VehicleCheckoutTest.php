<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Vehicle;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleCheckoutTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_checkout()
    {
        $data = $this->get_sample_data();

        $this->postJson('api/v1/vehicle/checkout', $data)
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);
    }

    /**
     * Validation Test
     *
     * @return void
     */
    public function test_checkout_validation()
    {
        $data = $this->get_sample_data();

        unset($data['customer_id']);

        $this->postJson('api/v1/vehicle/checkout', $data)
            ->assertStatus(422)
            ->assertJson(array (
                'message' => 'The given data was invalid.',
                'errors' =>
                array (
                  'customer_id' =>
                  array (
                    0 => 'The customer id field is required.'
                  )
                )
              ));
    }

    protected function get_sample_data()
    {
        $customer = Customer::factory()->create();
        $vehicle = Vehicle::factory()->create();

        return array (
            'customer_id'   =>  $customer->id,
            'vehicle_id'    =>  $vehicle->id,
            'vehicle_checkout'  =>  now()->toDateTimeString(),
            'vehicle_checkin'   =>  now()->toDateTimeString(),
            'vehicle_initial_condition'     =>  'Test conditions',
            'vehicle_returned_condition'    =>  'Test conditions',
            'rental_status' =>  'rented'
        );
    }
}
