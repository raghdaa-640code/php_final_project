<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReviewsPageTest extends TestCase
{
    public function test_reviews_page_loads_for_guests_without_auth_routes(): void
    {
        $response = $this->get('/reviews');

        $response->assertStatus(200);
    }
}
