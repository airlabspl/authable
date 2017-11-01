<?php

namespace Tests\Fakes;

use Airlabs\Authable\Authable;
use Illuminate\Foundation\Auth\User;

class Authenticable extends User
{
    use Authable;
}
