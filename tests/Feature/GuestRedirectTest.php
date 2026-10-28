<?php

namespace Tests\Feature;

use Tests\TestCase;

class GuestRedirectTest extends TestCase
{
    public function test_guests_are_redirected_to_the_named_login_route(): void
    {
        $response = $this->get('/user/userhome');

        $response->assertRedirect(route('auth.login'));
    }
}
