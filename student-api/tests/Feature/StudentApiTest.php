<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads(): void
    {
        $this->get('/')
            ->assertStatus(200);
    }

    public function test_user_can_register(): void
    {
        $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '9876543210',
            'password' => 'Password@123',
            'password_confirmation' => 'Password@123',
        ])->assertSuccessful();
    }

    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'login@example.com',
            'password' => bcrypt('Password@123'),
        ]);

        $this->postJson('/api/login', [
            'email' => 'login@example.com',
            'password' => 'Password@123',
        ])->assertSuccessful();
    }

    public function test_authenticated_user_can_create_student(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/students', [
                'name' => 'Test Student',
                'email' => 'student@example.com',
                'course' => 'MCA',
            ])->assertSuccessful();
    }

    public function test_authenticated_user_can_delete_student(): void
    {
        $user = User::factory()->create();

        $student = Student::create([
            'name' => 'Delete Student',
            'email' => 'delete@example.com',
            'course' => 'MCA',
        ]);

        $this->actingAs($user, 'sanctum')
            ->deleteJson('/api/students/' . $student->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }
}