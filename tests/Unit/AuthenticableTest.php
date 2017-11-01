<?php

namespace Tests\Unit;

use Tests\Fakes\Authenticable;
use Tests\TestCase;

class AuthenticableTest extends TestCase
{
    /** @test */
    function authenticable_has_a_default_guest_role()
    {
        $user = new Authenticable();

        $this->assertEquals('guest', $user->role());
    }
}
