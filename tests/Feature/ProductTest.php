<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_add_product()
    {
        // Arrange
        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::factory()->create(['role_id' => $adminRole->id]);

        // Act
        $response = $this->actingAs($admin)->post('/products', [
            'name' => 'Product 1',
            'description' => 'Test Product',
            'quantity' => 10,
            'product_type_id' => 1, // Assume there's a product type created
            'warehouse_location_id' => 1, // Assume there's a location created
        ]);

        // Assert
        $response->assertStatus(302); // Redirect after success
        $this->assertDatabaseHas('products', ['name' => 'Product 1']);
    }
}