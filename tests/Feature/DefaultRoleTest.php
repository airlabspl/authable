<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DefaultRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function default_guest_role_is_always_present()
    {
        $this->assertDatabaseHas('air_roles', [
            'name' => 'Guest',
            'slug' => 'guest'
        ]);
    }
}
