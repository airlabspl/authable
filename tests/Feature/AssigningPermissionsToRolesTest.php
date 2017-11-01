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
    function permission_can_be_attached_to_role()
    {
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $this->assertFalse($role->hasPermission($permission));

        $role->givePermission($permission);

        $this->assertEquals(1, $role->permissions()->count());
        $this->assertTrue($role->hasPermission($permission));
    }

    /** @test */
    function permission_can_be_detatched_from_role()
    {
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $role->givePermission($permission);

        $role->takePermission($permission);

        $this->assertEquals(0, $role->permissions()->count());
        $this->assertFalse($role->hasPermission($permission));
    }

    /** @test */
    function permission_can_be_toggled()
    {
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $role->togglePermission($permission);

        $this->assertEquals(1, $role->permissions()->count());
        $this->assertTrue($role->hasPermission($permission));

        $role->togglePermission($permission);

        $this->assertEquals(0, $role->permissions()->count());
        $this->assertFalse($role->hasPermission($permission));
    }

    /** @test */
    function permission_can_be_synced()
    {
        $role = factory(Role::class)->create();

        $firstPermission = factory(Permission::class)->create();
        $secondPermission = factory(Permission::class)->create();
        $thirdPermission = factory(Permission::class)->create();

        $this->assertFalse($role->hasPermission($firstPermission));
        $this->assertFalse($role->hasPermission($secondPermission));
        $this->assertFalse($role->hasPermission($thirdPermission));

        $role->syncPermissions([ $firstPermission->id, $thirdPermission->id ]);

        $this->assertTrue($role->hasPermission($firstPermission));
        $this->assertFalse($role->hasPermission($secondPermission));
        $this->assertTrue($role->hasPermission($thirdPermission));

        $role->syncPermissions([ $secondPermission->id, $thirdPermission->id ]);

        $this->assertFalse($role->hasPermission($firstPermission));
        $this->assertTrue($role->hasPermission($secondPermission));
        $this->assertTrue($role->hasPermission($thirdPermission));
    }
}
