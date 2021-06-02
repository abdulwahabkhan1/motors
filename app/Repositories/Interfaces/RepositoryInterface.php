<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all models.
     *
     * @param array $relations
     * @param array $filters
     */
    public function all(array $filters = []);

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model;


    /**
     * Updates a model.
     *
     * @param int $id
     * @param array $payload
     * @return Model
     */
    public function update(int $id, array $payload): ?Model;
}
