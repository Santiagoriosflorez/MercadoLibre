<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_belongs_to_a_category()
    {
        // Crear una categoría
        $category = Category::create(['name' => 'Electronics']);

        // Crear un producto asociado a la categoría
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Smartphone',
            'description' => 'Latest model',
            'worth' => 699.99,
            'stock' => 50,
        ]);

        // Verificar que el producto pertenece a la categoría
        $this->assertEquals('Electronics', $product->category->name);
    }

    /** @test */
    public function a_category_has_many_products()
    {
        // Crear una categoría
        $category = Category::create(['name' => 'Electronics']);

        // Crear dos productos asociados a la categoría
        $product1 = Product::create([
            'category_id' => $category->id,
            'name' => 'Smartphone',
            'description' => 'Latest model',
            'worth' => 699.99,
            'stock' => 50,
        ]);

        $product2 = Product::create([
            'category_id' => $category->id,
            'name' => 'Laptop',
            'description' => 'High performance',
            'worth' => 1299.99,
            'stock' => 30,
        ]);

        // Verificar que la categoría tiene dos productos
        $this->assertCount(2, $category->Products);
    }
}
