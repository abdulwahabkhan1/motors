<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Repositories\Interfaces\VehicleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AccountRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }
}
