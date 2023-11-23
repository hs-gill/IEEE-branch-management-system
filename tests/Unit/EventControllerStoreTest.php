<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use App\Models\Event;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class EventControllerStoreTest extends TestCase
{
    public function testStore()
    {
        $mockEvent = Mockery::mock(Event::class)->makePartial();
        Event::shouldReceive('new')->andReturn($mockEvent);
        $mockEvent->shouldReceive('save')->once();

        $controller = new EventController();

        $request = new Request([
            'title' => 'Test Event',
            'description' => 'Test Description',
            'image_path' => 'path/to/image.jpg'
        ]);

        $response = $controller->store($request);

        $this->assertEquals('/events', $response->getTargetUrl());
    }


    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
