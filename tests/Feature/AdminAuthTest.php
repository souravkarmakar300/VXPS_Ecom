<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;
    public function test_unauthenticated_admin_is_redirected_to_login_when_accessing_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
    }

    public function test_admin_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Admin Sign In');
    }

    public function test_admin_can_authenticate_using_login_screen(): void
    {
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@vxps.com'],
            [
                'name' => 'VXPS Admin',
                'password' => Hash::make('admin@12345'),
            ]
        );

        $response = $this->post('/admin/login', [
            'email' => 'admin@vxps.com',
            'password' => 'admin@12345',
        ]);

        $this->assertTrue(Auth::guard('admin')->check());
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_cannot_authenticate_with_invalid_password(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@vxps.com'],
            [
                'name' => 'VXPS Admin',
                'password' => Hash::make('admin@12345'),
            ]
        );

        $response = $this->from('/admin/login')->post('/admin/login', [
            'email' => 'admin@vxps.com',
            'password' => 'wrong-password',
        ]);

        $this->assertFalse(Auth::guard('admin')->check());
        $response->assertRedirect('/admin/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_authenticated_admin_cannot_access_login_page(): void
    {
        $admin = Admin::where('email', 'admin@vxps.com')->first();
        if (! $admin) {
            $admin = Admin::create([
                'name' => 'VXPS Admin',
                'email' => 'admin@vxps.com',
                'password' => Hash::make('admin@12345'),
            ]);
        }

        $response = $this->actingAs($admin, 'admin')->get('/admin/login');

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_authenticated_admin_cannot_access_register_page(): void
    {
        $admin = Admin::where('email', 'admin@vxps.com')->first();
        if (! $admin) {
            $admin = Admin::create([
                'name' => 'VXPS Admin',
                'email' => 'admin@vxps.com',
                'password' => Hash::make('admin@12345'),
            ]);
        }

        $response = $this->actingAs($admin, 'admin')->get('/admin/register');

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/register');

        $response->assertStatus(200);
        $response->assertSee('Register New Admin');
    }

    public function test_new_admin_can_register(): void
    {
        $email = 'manager_' . time() . '@vxps.com';

        $response = $this->post('/admin/register', [
            'name' => 'Store Manager',
            'email' => $email,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertDatabaseHas('admins', [
            'email' => $email,
            'name' => 'Store Manager',
        ]);

        $this->assertTrue(Auth::guard('admin')->check());
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_can_logout(): void
    {
        $admin = Admin::where('email', 'admin@vxps.com')->first();
        if (! $admin) {
            $admin = Admin::create([
                'name' => 'VXPS Admin',
                'email' => 'admin@vxps.com',
                'password' => Hash::make('admin@12345'),
            ]);
        }

        $response = $this->actingAs($admin, 'admin')->post('/admin/logout');

        $this->assertFalse(Auth::guard('admin')->check());
        $response->assertRedirect(route('admin.login'));
    }
}
