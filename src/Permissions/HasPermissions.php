<?php

namespace Airlabs\Authable\Permissions;

use Airlabs\Authable\Permission;

trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            config('authable.pivot_table', 'air_permissions_roles'),
            config('authable.users_role_column', 'role_id'),
            'permission_id'
        );
    }

    public function givePermission(Permission $permission)
    {
        return $this->permissions()->attach($permission);
    }

    public function takePermission(Permission $permission)
    {
        return $this->permissions()->detach($permission);
    }

    public function togglePermission($permission)
    {
        return $this->permissions()->toggle($permission);
    }

    public function syncPermissions(array $permissions = [])
    {
        return $this->permissions()->sync($permissions);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->permissions()->where('permission_id', $permission->id)->count() === 1;
    }
}
