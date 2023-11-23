<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Mockery;

class ItemControllerUpdateTest extends TestCase
{
    public function testUpdate()
    {
        $mockItem = Mockery::mock(Item::class)->makePartial();
        Item::shouldReceive('find')->with(any())->andReturn($mockItem);
        $mockItem->shouldReceive('save')->once();

        $controller = new ItemController();

        $request = new Request([
            'name' => 'Updated Item',
            'description' => 'Updated Description',
            'image_path' => 'updated/path/to/image.jpg',
            'item_category_id' => 1
        ]);

        $controller->update($request, $mockItem);

        // Assertions can be added if there are specific things to assert
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
