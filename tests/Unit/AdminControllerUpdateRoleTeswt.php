<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class AdminControllerUpdateRoleTest extends TestCase
{
    public function testUpdateRole()
    {
        $mockUser = Mockery::mock(User::class);
        User::shouldReceive('find')->with(any())->andReturn($mockUser);
        $mockUser->shouldReceive('roles')->andReturnSelf();
        $mockUser->shouldReceive('detach')->once();
        $mockUser->shouldReceive('attach')->once();

        $mockRole = Mockery::mock(Role::class);
        Role::shouldReceive('find')->with(any())->andReturn($mockRole);

        $controller = new AdminController();

        $request = new Request([
            'user' => ['id' => 1],
            'role' => ['id' => 1]
        ]);

        $controller->updateRole($request);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
