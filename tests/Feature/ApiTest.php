<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/sales');
		$response->assertStatus(200);
        $this->assertTrue(is_array($response->json()));
    }

    public function test_store()
    {
		$response = $this->postJson('/api/sales');
 
        $response->assertStatus(200);
    }

	public function test_store_failed()
	{
		$response = $this->postJson('/api/sales');
        $response->assertStatus(500);
	}
}
