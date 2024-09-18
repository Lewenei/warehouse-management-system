<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_register_user()
    {
        // Arrange
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $admin = User::factory()->create(['role_id' => $adminRole->id]);

        // Act
        $response = $this->actingAs($admin)->post('/admin/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role_id' => $userRole->id
        ]);

        // Assert
        $response->assertStatus(302); // Redirect after success
        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
    }
}
