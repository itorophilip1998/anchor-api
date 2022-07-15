<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarketingTest extends TestCase
{

    public function test_create_refferal_internally() {
       
        $this->json('POST', '/api/marketing/refferal', [])
    }
}
