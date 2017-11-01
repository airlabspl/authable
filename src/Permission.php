<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'air_permissions';

    protected $fillable = [ 'name', 'key' ];

    public function role()
    {
        return $this->belongsToMany(
            Role::class,
            'air_permissions_roles',
            'permission_id',
            'role_id'
        );
    }
}
