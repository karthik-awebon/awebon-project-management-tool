<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateProjectWithMandatoryFields()
    {
        $data = [
                        'project_name' => "New Product",
                        'project_price' => "This is a product",
                        'start_date' => true,
                ];

        $response = $this->json('POST', '/api/products', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }
}
