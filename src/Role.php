<?php

namespace Airlabs\Authable;

use Airlabs\Authable\Permissions\HasPermissions;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasPermissions;

    protected $fillable = [ 'name' ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('authable.roles_table', 'air_roles');
    }
}
