<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use Mockery;
use Tests\TestCase;

class EventControllerCreateTest extends TestCase
{
    public function testCreate()
    {
        $controller = new EventController();

        $response = $controller->create();

        $this->assertEquals('Events/Create', $response->name);
    }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
