<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    // Test 1: Homepage loads successfully
    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // Test 2: User can register
    public function test_user_can_register(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'User registered successfully',
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    // Test 3: User can login
    public function test_user_can_login(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'login@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'login@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Login successful',
                 ])
                 ->assertJsonStructure([
                     'user',
                     'token',
                 ]);
    }

    // Test 4: Authenticated user can create a student
    public function test_authenticated_user_can_create_student(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/students', [
            'name' => 'Arun Kumar',
            'email' => 'arun@example.com',
            'course' => 'MCA',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'name' => 'Arun Kumar',
                     'email' => 'arun@example.com',
                     'course' => 'MCA',
                 ]);

        $this->assertDatabaseHas('students', [
            'email' => 'arun@example.com',
        ]);
    }

    // Test 5: Authenticated user can delete a student
    public function test_authenticated_user_can_delete_student(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'delete@example.com',
            'password' => Hash::make('password123'),
        ]);

        Sanctum::actingAs($user);

        $student = Student::create([
            'name' => 'Rahul Kumar',
            'email' => 'rahul@example.com',
            'course' => 'MCA',
        ]);

        $response = $this->deleteJson('/api/students/' . $student->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Student deleted successfully',
                 ]);

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }
}
