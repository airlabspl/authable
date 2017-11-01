<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'air_roles';

    protected $fillable = [ 'name' ];

    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'air_permissions_roles',
            'role_id',
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

    public function hasPermission(Permission $permission)
    {
        return $this->permissions()->where('permission_id', $permission->id)->count() === 1;
    }
}
