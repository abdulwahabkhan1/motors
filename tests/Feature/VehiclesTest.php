<?php

namespace Tests\Feature;

use App\Models\Vehicle;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class VehiclesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_get_vehicles()
    {
        Vehicle::factory()
            ->count(30)
            ->create();

        $this->getJson('api/v1/vehicles')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data'  =>  [
                    '*'   =>  [
                        "id",
                        "model_year",
                        "make",
                        "model",
                        "transmission",
                        "body",
                        "color",
                        "created_at",
                        "updated_at"
                    ]
                ],
                'links' =>  [],
                'meta'  =>  []
            ]);
    }
}
