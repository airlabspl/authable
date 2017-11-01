<?php

namespace Airlabs\Authable;

trait Authable
{
    public function role()
    {
        return $this->belongsTo(Role::class)->withDefault([
            'id' => 0,
            'name' => 'Guest'
        ]);
    }

    public function assignRole(Role $role)
    {
        $this->role()->associate($role);

        $this->save();
    }
}
