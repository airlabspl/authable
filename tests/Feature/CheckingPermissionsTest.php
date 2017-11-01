<?php

namespace Tests\Feature;

use Airlabs\Authable\Permission;
use Airlabs\Authable\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
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

    /** @test */
    function permissions_can_be_checked_via_authorization_gates()
    {
        $user = factory(Authenticable::class)->create();
        $role = factory(Role::class)->create();
        $permission = factory(Permission::class)->create([
            'key' => 'air-test'
        ]);
        $role->permissions()->attach($permission);

        $this->actingAs($user);

        $response = $this->get('air/auth/test');
        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $user->assignRole($role);

        $permissions = $user->role->permissions;

        foreach ($permissions as $permission) {
            Gate::define($permission->key, function () {
                return true;
            });
        }

        $response = $this->get('air/auth/test');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee('Access');
    }
}
