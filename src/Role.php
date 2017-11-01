<?php

namespace Airlabs\Authable;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'air_roles';

    protected $fillable = [ 'name', 'slug' ];
}
