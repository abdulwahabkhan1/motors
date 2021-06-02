<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleCollection;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * @var vehicleRepository
     */
    protected $vehicleRepository;

    /**
     * VehicleController constructor.
     *
     * @param  $vehicleRepository
     */
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }
    /**
     * Get all vehicles.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $vehicles = $this->vehicleRepository->all(
            $request->get('filters', [])
        );

        return new VehicleCollection($vehicles);
    }
}
