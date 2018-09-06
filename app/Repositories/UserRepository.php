<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use App\Http\Entities\User\UserORMInterface;
use App\Exceptions\User\UserNotFoundException;
use App\Exceptions\User\UserNotCreatedException;
use App\Exceptions\User\UserNotUpdatedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements RepositoryInterface
{
    /**
     * Data access for User.
     *
     * @var UserORMInterface $user
     */
    protected $user;

    public function __construct(UserORMInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Return Collection of Users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate()
    {
        return $this->user->paginate();
    }

    /**
     * Find a User by ID.
     *
     * @param int $id
     *
     * @return UserORMInterface
     *
     * @throws UserNotFoundException
     */
    public function find(int $id)
    {
        try {
            $this->user = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new UserNotFoundException;
        }

        return $this->user;
    }

    /**
     * Create a User.
     *
     * @param array $data
     *
     * @return UserORMInterface
     *
     * @throws UserNotCreatedException
     */
    public function create(array $data)
    {
        try {
            return $this->user->create($data);
        } catch (QueryException $exception) {
            throw new UserNotCreatedException($exception);
        }
    }

    /**
     * Update a User
     *
     * @param array $data
     * @param array $options
     *
     * @return bool
     *
     * @throws UserNotUpdatedException
     */
    public function update(array $data, array $options = [])
    {
        try {
            return $this->user->update($data, $options);
        } catch (QueryException $exception) {
            throw new UserNotUpdatedException($exception);
        }
    }

    /**
     * Delete a User. If no
     * User is found null is
     * returned from Model.
     *
     * @return bool|null
     */
    public function delete()
    {
        return $this->user->delete();
    }
}