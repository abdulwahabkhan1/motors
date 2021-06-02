<?php

namespace Tests\Feature;

use App\Models\Rental;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleCheckinTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_checkin()
    {
        $rental = Rental::factory()->create();

        $data = $this->get_sample_data();

        $this->postJson('api/v1/vehicle/checkin/'.$rental->id, $data)
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
    public function test_checkin_validation()
    {
        $rental = Rental::factory()->create();

        $data = $this->get_sample_data();
        unset($data['vehicle_checkin']);

        $this->postJson('api/v1/vehicle/checkin/'.$rental->id, $data)
            ->assertStatus(422)
            ->assertJson(array (
                'message' => 'The given data was invalid.',
                'errors' =>
                array (
                  'vehicle_checkin' =>
                  array (
                    0 => 'The vehicle checkin field is required.'
                  )
                )
              ));
    }

    protected function get_sample_data()
    {
        return array (
            'vehicle_checkin'   =>  now()->toDateTimeString(),
            'vehicle_returned_condition'    =>  'Test conditions',
            'rental_status' =>  'returned'
        );
    }
}
