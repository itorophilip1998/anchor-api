<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarketingTest extends TestCase
{

    /**
     * This function create Referral Source
     * @return [type] [description]
     */
    public function test_create_referral_source() {
       $this->json('POST', '/api/marketing/source', [
            'name' => 'Organisation',
        ])->assertJson([
            'created' => true,
        ]);
    }
    /**
     * This test create referral types
     * @return [type] [description]
     */
    public function test_create_referral_type() {

        $this->json('POST', '/api/marketing/type', [
            'name' => 'Management Services',
        ])->assertJson([
            'created' => true,
        ]);
    }

    /**
     * This test create internal referral
     * @return [type] [description]
     */
    public function test_create_refferal_internally() {
       
        $this->json('POST', '/api/marketing/referral', [
            'contact_date' => '2022-07-15 12:02:40',
            'referral_type_id' => 1,
            'referral_sources_id' => 1,
            'firstname' => 'Lionel',
            'lastname' => 'Francis',
            'medicaid_number' => '12121',
            'client_phonenumber' => '873283232',
            'client_address' => 'address asasa assasa',
            'client_dob' => '2022-07-15',
            'client_language' => 'English',
            'hasMedicaid' => 1,
            'hasMedicare' => 1,
            'hasService' => 1
        ])->assertJson([
            'created' => true,
        ]);
    }

    /**
     * THIS TEST LIST ALL REFERRAL SROCES
     * @return [type] [description]
     */
    public function test_get_referral_sources() {
        $this->json('GET', '/api/merketing/sources')
         ->assertJsonStructure([
            '*' => [
                 'name',
            ]
        ]);
    }

    /**
     * This fnction list all referral types
     * @return [type] [description]
     */
    public function test_get_referral_types() {
        $this->json('GET', '/api/marketing/types')
        ->assertJsonStructure([
            '*' => [
                 'name',
            ]
        ]);
    }

    /**
     * [create_referral_actions description]
     * @return [type] [description]
     */
    public function create_referral_actions() {
       $this->json('POST', '/api/marketing/type', [
        
       ])->assertJson([
          'created' => true,
       ]);
    }


}
