<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [ 'name', 'key' ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('authable.permissions_table', 'air_permissions');
    }

    public function role()
    {
        return $this->belongsToMany(
            Role::class,
            config('authable.pivot_table', 'air_permissions_roles'),
            'permission_id',
            config('authable.users_role_column', 'role_id')
        );
    }
}
