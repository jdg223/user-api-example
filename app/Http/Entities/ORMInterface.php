<?php

namespace App\Http\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface ORMInterface
{
    /**
     * Get paginated collection of Models.
     *
     * @return Collection
     */
    public function paginate();

    /**
     * Find a Model by ID or throw
     * an exception.
     *
     * @param int $id
     *
     * @return ORMInterface
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id);

    /**
     * Create a Model with given
     * data.
     *
     * @param array $data
     *
     * @return ORMInterface
     */
    public function create(array $data);

    /**
     * Update a Model with given
     * data.
     *
     * @param array $attributes
     *
     * @param array $options
     *
     * @return bool
     */
    public function update(array $attributes = [], array $options = []);

    /**
     * Delete a Model.
     *
     * @return bool|null
     */
    public function delete();
}