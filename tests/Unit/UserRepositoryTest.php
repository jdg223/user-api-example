<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use App\Http\Entities\User\UserORMInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Exceptions\User\UserNotCreatedException;
use App\Exceptions\User\UserNotFoundException;
use App\Exceptions\User\UserNotUpdatedException;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\WithFaker;

class UserRepositoryTest extends TestCase
{
    /**
     * @var Mock
     */
    protected $userMock;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    use WithFaker;

    public function setUp()
    {
        $this->userMock = Mockery::mock(UserORMInterface::class);
        $this->userRepository = new UserRepository($this->userMock);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testUsersPaginated()
    {
        $this->userMock
            ->expects()->paginate()
            ->andReturn(Collection::class);

        $paginatedUsers = $this->userRepository->paginate();

        $this->assertEquals(Collection::class, $paginatedUsers);
    }

    public function testUserFound()
    {
        $userId = 1;

        $this->userMock
            ->expects()->findOrFail()->with($userId)
            ->andReturn(UserORMInterface::class);

        $foundUser = $this->userRepository->find($userId);

        $this->assertEquals(UserORMInterface::class, $foundUser);
    }


    public function testUserNotFound()
    {
        $userId = 1;
        $modelNotFoundException = Mockery::mock(ModelNotFoundException::class);

        $this->expectException(UserNotFoundException::class);

        $this->userMock
            ->expects()->findOrFail()->with($userId)
            ->andThrow($modelNotFoundException);

        $this->userRepository->find($userId);
    }

    public function testCreate()
    {
        $userData = ['name' => 'john', 'email' => 'john@email.com', 'password' => 'password'];

        $this->userMock
            ->expects()->create()->with($userData)
            ->andReturn(UserORMInterface::class);

        $userCreated = $this->userRepository->create($userData);

        $this->assertEquals(UserORMInterface::class, $userCreated);

    }

    public function testCreateAttemptFailed()
    {
        $emptyUserData = [];
        $queryException = Mockery::mock(QueryException::class);

        $this->expectException(UserNotCreatedException::class);

        $this->userMock
            ->expects()->create()->with($emptyUserData)
            ->andThrow($queryException);

        $this->userRepository->create($emptyUserData);

    }

    public function testUserUpdated()
    {
        $userData = ['name' => 'john', 'email' => 'john@email.com'];

        $this->userMock
            ->expects()->update()->with($userData, [])
            ->andReturn(true);

        $userUpdated = $this->userRepository->update($userData, []);

        $this->assertTrue($userUpdated);
    }

    public function testUserNotUpdated()
    {
        $userData = [];
        $queryException = Mockery::mock(QueryException::class);


        $this->expectException(UserNotUpdatedException::class);

        $this->userMock
            ->expects()->update()->with($userData, [])
            ->andThrow($queryException);

        $this->userRepository->update($userData, []);
    }

    public function testUserDeleted()
    {
        $this->userMock
            ->expects()->delete()->andReturn(true);

        $userDeleted = $this->userRepository->delete();

        $this->assertTrue($userDeleted);
    }

    public function testUserNotDeleted()
    {
        $this->userMock
            ->expects()->delete()->andReturn(null);

        $userDeleted = $this->userRepository->delete();

        $this->assertNull($userDeleted);
    }
}
