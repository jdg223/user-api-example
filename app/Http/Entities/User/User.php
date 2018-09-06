<?php

namespace App\Http\Entities\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App\Http\Entities\User
 */
class User extends Authenticatable implements UserORMInterface
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get paginated collection of Users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate()
    {
        return parent::paginate();
    }

    /**
     * Create a user with given
     * data.
     *
     * @param array $data
     *
     * @return ORMInterface
     */
    public function create(array $data): UserORMInterface
    {
        return parent::create($data);
    }

    /**
     * Find a User with specified ID
     * or throw an exception.
     *
     * @param int $id
     *
     * @return ORMInterface
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id): UserORMInterface
    {
        return parent::findOrFail($id);
    }

    /**
     * Update a User with given data.
     *
     * @param array $attributes
     * @param array $options
     *
     * @return bool
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        return parent::update($attributes, $options);
    }

    /**
     * Delete a User.
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete(): bool
    {
        return parent::delete();
    }
}
