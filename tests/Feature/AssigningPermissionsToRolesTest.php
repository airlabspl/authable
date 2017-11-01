<?php

namespace Tests\Feature;

use Airlabs\Authable\Permission;
use Airlabs\Authable\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssigningPermissionsToRolesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function permission_can_be_assigned_to_role()
    {
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $this->assertFalse($role->hasPermission($permission));

        $role->givePermission($permission);

        $this->assertEquals(1, $role->permissions()->count());
        $this->assertTrue($role->hasPermission($permission));
    }
}
