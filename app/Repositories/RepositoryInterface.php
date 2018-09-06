<?php

namespace App\Repositories;


use App\Http\Entities\ORMInterface;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    /**
     * Create Model with given data.
     *
     * @param array $data
     *
     * @return ORMInterface
     */
    public function create(array $data);

    /**
     * Update requested Model with given
     * data.
     *
     * @param array $data
     * @param array $options
     *
     * @return bool
     */
    public function update(array $data, array $options = []);

    /**
     * Delete a Model. If no Model
     * is found then null is returned
     * from the model.
     *
     * @return bool|null
     */
    public function delete();

    /**
     * Paginated Collection of Models.
     *
     * @return Collection
     */
    public function paginate();

    /**
     * Find Model by ID.
     *
     * @param int $id
     *
     * @return ORMInterface
     */
    public function find(int $id);
}