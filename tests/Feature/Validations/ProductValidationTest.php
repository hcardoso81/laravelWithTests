<?php

namespace Tests\Feature\Validations;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreateUser;
use Tests\TestCase;

class ProductValidationTest extends TestCase
{

    use RefreshDatabase;
    use CreateUser;
    private User $user;

    public function test_product_name_field_is_required(): void
    {
        $user = $this->createNewUser(true);
        $product = [
            'name' => '',
        ];
        $response = $this->actingAs($user)->post('/products', $product);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name' => 'El nombre del producto es obligatorio.']);
    }

    public function test_product_name_field_is_string(): void
    {
        $user = $this->createNewUser(true);
        $product = [
            'name' => 12,
        ];
        $response = $this->actingAs($user)->post('/products', $product);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name' => 'El nombre del producto debe ser un campo string.']);
    }

    public function test_product_price_field_is_required(): void
    {
        $user = $this->createNewUser(true);
        $product = [
            'price' => '',
        ];
        $response = $this->actingAs($user)->post('/products', $product);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['price' => 'El precio del producto es obligatorio.']);
    }

    public function test_product_price_field_is_numeric(): void
    {
        $user = $this->createNewUser(true);
        $product = [
            'price' => 'test',
        ];
        $response = $this->actingAs($user)->post('/products', $product);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['price' => "El precio del producto debe ser un valor numerico."]);
    }
}
