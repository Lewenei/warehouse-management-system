<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_register_user()
    {
        // Arrange: Create an admin user
        /** @var \App\Models\User $admin */
        $admin = User::factory()->create([
            'role' => 'admin',  // Using 'admin' role as string
            'password' => bcrypt('password'), // Ensure the admin user can authenticate
        ]);

        // Act: Admin registers a new user
        $response = $this->actingAs($admin)->post('/admin/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'user',  // Assigning 'user' role as string
        ]);

        // Assert: Check if the user is created and the response is correct
        $response->assertStatus(302); // Redirect after success
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
            'role' => 'user',  // Checking if the 'user' role is assigned as expected
        ]);
    }
}
