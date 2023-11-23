<?php

namespace Tests\Unit;

use App\Http\Controllers\FeedbackController;
use Tests\TestCase;

class FeedbackControllerCreateTest extends TestCase
{
    public function testCreate()
    {
        $controller = new FeedbackController();

        $response = $controller->create();

        $this->assertEquals('Feedbacks/Create', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
