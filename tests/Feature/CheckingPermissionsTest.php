<?php

namespace Tests\Feature;

use Airlabs\Authable\Permission;
use Airlabs\Authable\Role;
use Tests\Fakes\Authenticable;
use Tests\TestCase;

class CheckingPermissionsTest extends TestCase
{
    /** @test */
    function default_users_dont_have_any_permissions()
    {
        $user = factory(Authenticable::class)->create();
        $permission = factory(Permission::class)->create();

        $this->assertFalse($user->hasPermission($permission));
    }

    /** @test */
    function user_with_role_gains_its_permissions()
    {
        $user = factory(Authenticable::class)->create();
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $role->permissions()->attach($permission);
        $user->assignRole($role);

        $this->assertTrue($user->hasPermission($permission));
    }
}
