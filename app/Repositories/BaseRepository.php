<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $relations
     * @param array $filters

     */
    public function all(array $filters = [])
    {
        $model = $this->model;

        foreach($filters as $key => $value){
            $model->where($key, $value);
        }

        return $model->paginate(10);
    }


    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * Updates a model.
     *
     * @param int $id
     * @param array $payload
     * @return Model
     */
    public function update(int $id,array $payload): ?Model
    {
        $model = $this->model->find($id);
        $model->fill($payload);
        $model->save();

        return $model->fresh();
    }

}
