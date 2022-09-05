<?php 
namespace App\Services\Task;

use App\Models\Task;
use App\Models\TaskField;
use App\Models\TaskTemplate;
use App\Models\TaskComponent;
use App\Models\TaskCategory;
use App\Models\TaskFieldTemplate;

use App\Http\Resources\Task\TaskResource;
use App\Http\Resources\Task\TaskCollection;
use App\Http\Resources\Task\TaskTemplateResource;
use App\Http\Resources\Task\TaskTemplateCollection;
use App\Http\Resources\Task\TaskFieldResource;

use App\Services\Task\TaskTemplates;
use App\Services\User\UserService;

use Response;

class TaskService {

   protected $template;

   /**
    * THIS IS CONSTROCTOR
    * @param TaskTemplate $tasktemplate [description]
    */
	public function __construct(TaskTemplate $tasktemplate) {
	   $this->template = $tasktemplate;
	}

	public function index() {}

	// public function scheduleTask(array $array) {
      
	// 	if ( $array['modules'] == 'Clinical') { $array['modules'] = 'Nurse'; }

	// 	$users = (new UserService)->getUserByRoleName($array['modules']);

	// 	foreach( $users as $user ) {

	// 		$task                            = new Task;
	// 		$task->priority                  = $array['priority'];
	// 		$task->assigned_id               = $user->id;
	// 		$tadk->frequency                 = $array['frequency'];
	// 		$task->estimated_completion_time = $array['estimated_time'];
	// 		$task->save();

	// 		if (	$task->save() ) {
				
	// 			 $template = $this->template->where('id', '=', $array['modules'])->first();

	// 			 $taskTaskTemplate = new TaskTaskTemplate;
	// 			 $taskTaskTemplate->task_id = $task->id;
	// 			 $taskTaskTemplate->task_template_id = $template->id;
	// 			 $taskTaskTemplate->save();
	// 		}
	// 	}

	// 	return [
	// 		'status' => true,
	// 	];
	// }

	public function scheduleTask(array $array) {

		$array['modules']='Nurse';
      
		//if ( $array['modules'] == 'Clinical') { $array['modules'] = 'Nurse'; }

		$role = (new UserService)->getUserByRoleName($array['modules']);

		// foreach( $users as $user ) {

			$task  = new Task;
            $task->title=$array['title'];
            $task->uid= $role->uid;
			$task->user_id= $role->id;
			$task->frequency=$array['frequency'];
			$task->levels=$array['levels'];
			$task->date=$array['date'];
			$task->time=$array['time'];
			$task->save();

			// if ($task->save()) {
				
			// 	 $template = $this->template->where('id', '=', $array['modules'])->first();

			// 	 $taskTaskTemplate = new TaskTemplates;
			// 	 $taskTaskTemplate->task_id = $task->id;
			// 	 $taskTaskTemplate->task_template_id = $template->id;
			// 	 //$taskTaskTemplate->save();
			// }
		//}

		return [
			'status' => true,
		];
	}


	public function getUserByRole($template) {
      return User::with('roles')->get();
	}


	/**
	 * [taskTemplateDetails description]
	 * @param  [type] $taskTemplateId [description]
	 * @return [type]                 [description]
	 */
	public function taskTemplateDetails($taskTemplateId) {

		$details = (new TaskTemplate)->where('id', '=', $taskTemplateId)->first();
		return new TaskTemplateResource($details);
	}

	/**
	 * This function get all tasks template
	 * @param  array  $params [description]
	 * @return [type]         [description]
	 */
	public function getAllTaskTemplate(array $array) {

		$template = $this->template;

		if ($array['modules'] !== false ) {
			$template = $this->template->where('task_component_id', '=', $array['modules']);
		}

		if ($array['category'] !== false ) {
			$template = $this->template->where('task_category_id', '=', $array['category']);
		}

		return new TaskTemplateCollection($template->get());
	}

	public function getTaskFieldTemplate() {
	 	return Response::json((new TaskFieldTemplate)->get());
	}

	/**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTaskModules() {
		return Response::json((new TaskComponent)->all());
	}

	/**
	 * THIS FUNCTION GET ALL CATEGORY FOR TASK
	 * @return [type] [description]
	 */
	public function getTaskCategories() {
		return Response::json((new TaskCategory)->get());
	}

	/**
	 * *********************************************************************
	 * This generate Task Field 
	 * *********************************************************************
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function generateTaskFieldById($id) {

		$template = (new TaskFieldTemplate)->where('id', '=', $id)->first();
      return (new TaskTemplates)->createTaskTemplate($template->name, $id);
	}

	/**
	 * This function get deild nu details
	 * [getFieldDetails description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getFieldDetails($id) {

		$details = TaskField::find($id);
		return new TaskFieldResource($details);
	}

}


 ?>