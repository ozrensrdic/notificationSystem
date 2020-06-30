<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use PHPUnit\Framework\TestCase;

class UserDataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_admin_has_right_role()
    {
        $admin = User::load(1);

        $this->assertTrue($admin->hasRole(Role::ADMINISTRATOR));
    }

}
