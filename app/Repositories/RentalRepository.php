<?php

namespace App\Repositories;

use App\Models\Rental;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class RentalRepository extends BaseRepository implements RentalRepositoryInterface
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
    public function __construct(Rental $model)
    {
        $this->model = $model;
    }
}
