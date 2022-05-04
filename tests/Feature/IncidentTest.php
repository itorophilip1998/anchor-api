<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class IncidentTest extends TestCase
{
    public function test_incident_reason_exist() {

         $user = User::find(1);
         $token = $user->createToken('API Token')->accessToken;
        
         $this->withHeaders(['Authorization' => 'Bearer '.$token])
             ->json('GET', 'api/incidents/get-reasons')
             ->assertStatus(200);
    }

    public function test_store_reason_response() {

        $user = User::find(1);
        $token = $user->createToken('API Token')->accessToken;

        $this->withHeaders('Authorization' => 'Bearer '.$token)
    } 
}
