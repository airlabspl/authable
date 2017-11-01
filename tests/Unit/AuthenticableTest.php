<?php

namespace Tests\Unit;

use Airlabs\Authable\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Fakes\Authenticable;
use Tests\TestCase;

class AuthenticableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function authenticable_has_a_default_guest_role()
    {
        $user = factory(Authenticable::class)->create();
        $role = $user->role;

        $this->assertInstanceOf(Role::class, $role);
        $this->assertEquals('Guest', $role->name);
    }
}
