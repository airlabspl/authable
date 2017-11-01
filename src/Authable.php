<?php

namespace Airlabs\Authable;

trait Authable
{
    public function role()
    {
        return $this->belongsTo(Role::class)->withDefault([
            'id' => 0,
            'name' => config('authable.guest_role_name')
        ]);
    }

    public function assignRole(Role $role)
    {
        $this->role()->associate($role);

        $this->save();
    }

    public function hasPermission(Permission $permission)
    {
        return $this->role->hasPermission($permission);
    }
}
