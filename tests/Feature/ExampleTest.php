<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function product_stock_can_be_checked_at_retailer(): void
    {
        $switch = Product::create(['name' => 'Nintendo Switch']);

        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $this->assertFalse($switch->inStock());

        $stock = new Stock([
            'price' => 10000,
            'url' => 'https://foo.com',
            'sku' => '12345',
            'in_stock' => true
        ]);

        $bestBuy->addStock($switch, $stock);

        $this->assertTrue($switch->inStock());
    }
}
