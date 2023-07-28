<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_see_the_empty_products_table(): void
    {
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products', Product::all());
        $response->assertSee('No se encontraton productos');
    }

    public function test_can_see_the_non_empty_products_table(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 10,
        ]);
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products', Product::all());
        $response->assertDontSee('No se encontraton productos');
    }

    public function test_can_a_new_product(): void
    {
        $product = [
            'name' => 'Producto #1',
            'price' => 25,
        ];

        $response = $this->post('/products', $product);
        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseCount('products', 1);
        $lastProductcreated = Product::query()->latest()->first();
        /*$this->assertDatabaseHas('products', [
            'name' => $lastProductcreated->name,
            'price' => $lastProductcreated->price
        ]);*/
        $this->assertDatabaseHas('products', $product);
        $this->assertEquals($product['name'], $lastProductcreated->name);
        $this->assertEquals($product['price'], $lastProductcreated->price);
    }
}
