<?php

namespace Tests\Unit;

use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Mockery;

class FeedbackControllerStoreTest extends TestCase
{
    public function testStore()
    {
        Auth::shouldReceive('user')->andReturn((object) ['id' => 1]);

        $mockFeedback = Mockery::mock(Feedback::class)->makePartial();
        Feedback::shouldReceive('new')->andReturn($mockFeedback);
        $mockFeedback->shouldReceive('save')->once();

        $controller = new FeedbackController();

        $request = new Request([
            'title' => 'Test Feedback',
            'description' => 'Test Description'
        ]);

        $response = $controller->store($request);

        $this->assertEquals('/feedbacks/create', $response->getTargetUrl());
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
