<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComplaintCategory;
use App\Models\ComplaintType;

class ComplaintCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComplaintCategory::create(['id' => 1,  'name' => 'Property/Environmental']);
        ComplaintCategory::create(['id' => 2,  'name' => 'Physical – Client']);
        ComplaintCategory::create(['id' => 3,  'name' => 'Physical – Home Care Worker']);
        ComplaintCategory::create(['id' => 4,  'name' => 'Work Schedule/Performance']);
        ComplaintCategory::create(['id' => 5,  'name' => 'Other Complaints']);

        ComplaintType::create(['id' => 1, 'name' => 'Home Environmental', 'category_id' => 1]);
        ComplaintType::create(['id' => 2, 'name' => 'Theft - Putting Client at Risk', 'category_id' => 1,  'level' => 1]);
        ComplaintType::create(['id' => 3, 'name' => 'Physical Abuse', 'category_id' => 2, 'level' => 1]);
        ComplaintType::create(['id' => 4, 'name' => 'Injury', 'category_id' => 2, 'level' => 1]);
        ComplaintType::create(['id' => 5, 'name' => 'Fall - Incident ', 'category_id' => 2, 'level' => 1]);
        // ComplaintType::create(['id' => 6, 'name' => 'Client Place at Risk', 'category_id' => 2, 'level' => 1]);

        ComplaintType::create(['id' => 7,  'name' =>  'Pysical Abuse', 'category_id' => 3, 'level' => 1]);
        ComplaintType::create(['id' => 8,  'name' =>  'Failure To Report', 'category_id' => 4, 'level' => 1]);
        ComplaintType::create(['id' => 9,  'name' =>  'Poor Performance', 'category_id' => 4,  'level' => 1 ]);
        ComplaintType::create(['id' => 10, 'name' =>  'Lateness / Leave Early', 'category_id' => 4, 'level' => 4]);
        ComplaintType::create(['id' => 11, 'name' =>  'Family', 'category_id' => 5, 'level' => 4]);
        ComplaintType::create(['id' => 12, 'name' =>  'Personality Conflict', 'category_id' => 5, 'level' => 4]);
        ComplaintType::create(['id' => 13, 'name' =>  'Verbal Abuse', 'category_id' => 5,  'level' => 1 ]);
        ComplaintType::create(['id' => 14, 'name' =>  'Sexual Assault', 'category_id' => 5,  'level' => 1]);
        ComplaintType::create(['id' => 15, 'name' =>  'Absenteeism', 'category_id' => 4,  'level' => 1 ]);
        ComplaintType::create(['id' => 16, 'name' =>  'Theft - Client not at risk', 'category_id' => 1,  'level' => 2]);
        ComplaintType::create(['id' => 17, 'name' =>  'Past Absenteeism - No Risk', 'category_id' => 5,  'level' => 3]);
        ComplaintType::create(['id' => 18, 'name' =>  'Poor Performance - Unsanitary condition with health risk', 'category_id' => 5, 'level' => 3]);

        ComplaintType::create(['id' => 19, 'name' => 'Absenteeism - Less serious', 'category_id' => 5, 'level' => 4]);
        ComplaintType::create(['id' => 20, 'name' => 'Poor Performance - Less Serious', 'category_id' => 5, 'level' => 4]);
        ComplaintType::create(['id' => 21, 'name' => 'Call to Agency by CTU', 'category_id' => 5, 'level' => 4]);
        ComplaintType::create(['id' => 22, 'name' => 'Call to Agency by HRA', 'category_id' => 5, 'level' => 4]);
        ComplaintType::create(['id' => 23, 'name' => 'Theft - $250 or Greater and Client not at Risk  ', 'category_id' => 5, 'level' => 2]);



    }
}
