<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Role;
use PHPUnit\Framework\TestCase;
use Mockery;

class AdminControllerIndexTest extends TestCase
{
    public function testIndex()
    {
        $mockedUsers = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        User::shouldReceive('with')->with('roles.permissions')->andReturnSelf();
        User::shouldReceive('get')->andReturn($mockedUsers);

        $mockedRoles = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        Role::shouldReceive('with')->with('permissions')->andReturnSelf();
        Role::shouldReceive('get')->andReturn($mockedRoles);

        $controller = new AdminController();

        $response = $controller->index();

        $this->assertEquals('Admin/Users/Main', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
