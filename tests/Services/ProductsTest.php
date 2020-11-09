<?php
namespace App\Tests\Services;

use App\Service\ProductService;
use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{
    public function testfindById()
    {
        $product = new ProductService();
        $result  = $product->adfindProductById(1);

        $this->assertEquals(42, $result);
    }
}