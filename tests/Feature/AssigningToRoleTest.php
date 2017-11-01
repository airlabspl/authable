<?php

namespace Tests\Feature;

use Airlabs\Authable\Role;
use Tests\Fakes\Authenticable;
use Tests\TestCase;

class AssigningToRoleTest extends TestCase
{
    /** @test */
    function authenticable_can_be_assigned_to_a_role()
    {
        $user = factory(Authenticable::class)->create();
        $role = factory(Role::class)->create();

        $user->assignRole($role);

        $this->assertInstanceOf(Role::class, $user->role);
        $this->assertEquals($role->name, $user->role->name);
    }
}
