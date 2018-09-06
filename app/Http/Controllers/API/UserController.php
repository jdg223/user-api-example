<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\ReplaceUser;
use App\Http\Requests\User\StoreUser;
use App\Http\Requests\User\UpdateUser;
use App\Http\Resources\UserCollection;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a paginated Collection of the Users.
     *
     * @return \Illuminate\Http\Response
     *
     * @see https://laravel.com/docs/5.6/pagination#displaying-pagination-results
     * Converting to JSON
     */
    public function index()
    {
        // Pagination methods in Eloquent return JSON if called from
        // controller.
        return new UserCollection($this->userRepository->paginate());
    }

    /**
     * Store a newly created User in storage.
     *
     * @param StoreUser $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \App\Exceptions\User\UserNotCreatedException
     */
    public function store(StoreUser $request)
    {
        $validatedUserData = $request->validated();

        return response()->json($this->userRepository->create($validatedUserData));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \App\Exceptions\User\UserNotFoundException
     */
    public function show($id)
    {
        return response()->json($this->userRepository->find($id));
    }

    /**
     * Update the specified User in storage.
     *
     * @param UpdateUser $request
     * @param  int $id
     *
     * @return bool
     *
     * @throws \App\Exceptions\User\UserNotFoundException
     * @throws \App\Exceptions\User\UserNotUpdatedException
     */
    public function update(UpdateUser $request, $id)
    {
        $validatedUserData = $request->validated();

        return response()->json(['updated' => $this->userRepository->find($id)->update($validatedUserData)]);
    }

    /**
     * Replace the specified User in storage.
     *
     * @param UpdateUser $request
     * @param  int $id
     *
     * @return bool
     *
     * @throws \App\Exceptions\User\UserNotFoundException
     * @throws \App\Exceptions\User\UserNotUpdatedException
     */
    public function replace(ReplaceUser $request, $id)
    {
        $validatedUserData = $request->validated();

        return response()->json(['replaced' => $this->userRepository->find($id)->update($validatedUserData)]);
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return bool|null
     *
     * @throws \App\Exceptions\User\UserNotFoundException
     */
    public function destroy($id)
    {
        return response()->json(['deleted' => $this->userRepository->find($id)->delete()]);
    }
}
