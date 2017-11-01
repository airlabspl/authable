<?php

namespace Airlabs\Authable;

use Airlabs\Authable\Permissions\HasPermissions;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasPermissions;

    protected $table = 'air_roles';

    protected $fillable = [ 'name' ];
}
