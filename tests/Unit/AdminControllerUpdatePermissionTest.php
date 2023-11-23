<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class AdminControllerUpdatePermissionTest extends TestCase
{
    public function testUpdatePermission()
    {
        $mockRole = Mockery::mock(Role::class);
        Role::shouldReceive('find')->with(any())->andReturn($mockRole);
        $mockRole->shouldReceive('permissions')->andReturnSelf();
        $mockRole->shouldReceive('contains')->once()->andReturn(true);
        $mockRole->shouldReceive('detach')->once();
        $mockRole->shouldReceive('attach')->never();

        $mockPermission = Mockery::mock(Permission::class);
        Permission::shouldReceive('find')->with(any())->andReturn($mockPermission);

        $controller = new AdminController();

        $request = new Request([
            'role' => ['id' => 1],
            'permission' => ['id' => 1]
        ]);

        $controller->updatePermission($request);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
