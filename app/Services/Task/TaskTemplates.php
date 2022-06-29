<?php 

namespace App\Services\Task;

use App\Models\TaskField;
use Response;

class TaskTemplates {

	public function createTaskTemplate($params, $template_id) {
	
		if ( $params == 'Personal Data') {

			 TaskField::create([ 
			 	'caption' => 'Patient First Name',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 2
			 ]);

			 TaskField::create([ 
			 	'caption' => 'Patient Middle Name',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 2
			 ]);

			 TaskField::create([ 
			 	'caption' => 'Patient Last Name ',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 2
			 ]);

			 TaskField::create([ 
			 	'caption' => 'Preferred Name',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 2
			 ]);

			  TaskField::create([ 
			 	'caption' => 'Suffix',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 12
			 ]);

			 TaskField::create([ 
			 	'caption' => 'Date of Birth',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 7
			 ]);

			 TaskField::create([ 
			 	'caption' => 'Living Situation',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 13
			 ]);

			 TaskField::create([ 
			 	'caption' => 'Floor Number',
			 	'task_template_id' => $template_id,
			 	'element_type_id' => 9
			 ]);

			  TaskField::create([ 
			 	 'caption' => 'Elevator',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 5
			 ]);

			  TaskField::create([ 
			 	 'caption' => 'Live Alone',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 5
			 ]);

			  TaskField::create([ 
			 	 'caption' => 'List of People Living in Home',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 14
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'Street Address',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 1
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'City',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 1
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'State',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 1
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'Zip',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 9
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'County',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 15
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'Client ID Number ',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 9
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'Social Security Number ',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 4
			  ]);

			  TaskField::create([ 
			 	 'caption' => 'Home Phone Number ',
			 	 'task_template_id' => $template_id,
			 	 'element_type_id' => 4
			  ]);

			  TaskField::create([ 
			 	  'caption' => 'Work Phone Number',
			 	  'task_template_id' => $template_id,
			 	  'element_type_id' => 4
			  ]);

			   TaskField::create([ 
			 	  'caption' => 'Patient Email',
			 	  'task_template_id' => $template_id,
			 	  'element_type_id' => 4
			   ]);

			   TaskField::create([ 
			 	  'caption' => 'Medicaid Number ',
			 	  'task_template_id' => $template_id,
			 	  'element_type_id' => 9
			   ]);

			    TaskField::create([ 
			 	  'caption' => 'Primary Hospital',
			 	  'task_template_id' => $template_id,
			 	  'element_type_id' => 16
			   ]);

			   TaskField::create([ 
			 	  'caption' => 'Closets Hospital',
			 	  'task_template_id' => $template_id,
			 	  'element_type_id' => 16
			   ]);
		}
	}
	
}

 ?>