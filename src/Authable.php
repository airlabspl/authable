<?php

namespace Airlabs\Authable;

trait Authable
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
