<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{

    public function test_can_see_documentation_word_in_home_page(): void
    {
        $response = $this->get('/');
        $response->assertSee('Documentation');
        $response->assertStatus(200);
    }
}
