<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;

class InvestigationTest extends TestCase
{
    
    /**
     * Test if investigation types is listing
     * @return [type] [description]
     */
    public function test_list_investigation_types() {
        $this->json('GET', '/api/investigations/types')
            ->assertJsonStructure([
                '*' => [
                    'name',
                ]
            ]);
    }  

}
