<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreateUser;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use CreateUser;
    private User $user;



    public function test_an_admin_can_see_the_empty_products_table(): void
    {
        $user = $this->createNewUser(true);
        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products', Product::all());
        $response->assertSee('No se encontraton productos');
    }


    public function test_an_guest_cannot_see_the_empty_products_table(): void
    {
        $user = $this->createNewUser(false);
        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertStatus(404);
    }

    public function test_can_see_the_non_empty_products_table(): void
    {
        $user = $this->createNewUser(true);
        Product::create([
            'name' => 'Product 1',
            'price' => 10,
        ]);
        $response = $this->actingAs($user)->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products', Product::all());
        $response->assertDontSee('No se encontraton productos');
    }

    public function test_can_create_a_new_product(): void
    {
        $user = $this->createNewUser(true);

        $product = [
            'name' => 'Producto #1',
            'price' => 25,
        ];
        $response = $this->actingAs($user)->post('/products', $product);
        $response->assertStatus(302);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseCount('products', 1);
        $lastProductCreated = Product::query()->latest()->first();
        $this->assertDatabaseHas('products', $product);
        $this->assertEquals($product['name'], $lastProductCreated->name);
        $this->assertEquals($product['price'], $lastProductCreated->price);
    }

    public function test_can_edit_a_product(): void
    {
        $user = $this->createNewUser(true);
        $product = Product::create([
            'name' => 'Producto #1',
            'price' => 200,
        ]);

        $response = $this->actingAs($user)->put('/products/' . $product->id, [
            'name' => 'Producto Editado',
            'price' => 300,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseCount('products', 1);
        $lastProductUpdated = Product::query()->latest()->first();
        $this->assertEquals('Producto Editado', $lastProductUpdated->name);
    }

    public function test_can_delete_product_successfull(): void
    {
        $user = $this->createNewUser(true);
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->delete('/products/' . $product->id);
        $response->assertStatus(302);
        $this->assertDatabaseCount('products', 0);
        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
