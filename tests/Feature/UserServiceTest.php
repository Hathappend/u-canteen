<?php

namespace Tests\Feature;

use App\Http\Requests\UserRequest;
use App\Service\UserService;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
        DB::delete('delete from users');
    }

    public function testLoginSuccess()
    {
        $this->seed(UserSeeder::class);
        $result = $this->userService->login('asep', 'rahasia');

        self::assertTrue($result);
    }

    public function testLoginFailed()
    {
        $this->seed(UserSeeder::class);
        $result = $this->userService->login('gagal', 'rahasia');

        self::assertFalse($result);
    }

}
