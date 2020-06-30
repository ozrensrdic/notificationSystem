<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessTest extends TestCase
{
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function admin_user_can_view_a_ships_page()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->get('/ships');

        $response->assertSuccessful();
        $response->assertViewIs('ships.index');
    }
}
