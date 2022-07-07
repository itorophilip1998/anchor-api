<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;
use App\Models\User;

class ComplaintTest extends TestCase
{
    use WithoutMiddleware;

    public function test_store_complaint_category() {
      $this->json('POST',  '/api/complaints/store-category', ['name' => 'Property/Environmental'])
      ->assertJson([
          'created' => true,
       ]);
    }

    public function test_list_complaint_category() {

        $this->json('GET', '/api/complaints/categories')
            ->assertJsonStructure([
                '*' => [
                     'name',
                ]
            ]);
    }

    public function test_store_complaint_category_type() {

        $this->json('POST', '/api/complaints/store-category-type/1', ['name' => 'Theft'])
            ->assertJson([
                'created' => true
            ]);
    }

    public function test_get_category_type_by_category() {

       $this->json('GET', '/api/complaints/category-types/1')
        ->assertJsonStructure([
            '*' => [
                 'name',
            ]
        ]);
    }

    public function test_get_all_complaint_category_type() {

        $this->json('GET', '/api/complaints/category-types')
            ->assertJsonStructure([
                '*' => [
                    'name'
                ]
            ]);
    }
    
    public function test_create_complaint() {

        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/complaints', array( 
            'date_reported' => '2022-05-29',
            'isRoutineServiceIssue' => 'true',
            'occurrence_date' => '2022-01-04',
            'reported_timeline' => 'Immediately',
            'reported_by' => 1,
            'client_relationship' => 'client_relationship',
            'isSelfDirecting' => 'true',
            'cluster' => 'false',
            'complaint_hours' => 'Service Hours',
            'complaint_category_id' => 1,
            'complaint_type_id' => 1,
            'complaint_time' => '10:00:00',
            'client' => [  array('client_id' => 1), array('client_id' => 2) ],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit'
        ));

        $response
          ->assertStatus(201)
          ->assertJson([
                'created' => true
            ]);
    }
}

          
