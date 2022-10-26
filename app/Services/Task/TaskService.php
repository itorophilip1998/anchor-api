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

		foreach( $array['assigned_to'] as $role ) {

			$task               = new Task;
            $task->title        = $array['title'];
            $task->assigned_to  = $role['id'];
            $task->uid          = $role['uid'];
			$task->user_id      = $role['id'];
			$task->frequency    = $array['frequency'];
			$task->levels       = $array['levels'];
            $task->module       = $array['modules'];
            $task->category     = $array['category'];

            $task->assigned_type = 'Role';

            //formate date to mysql date
            $time       = strtotime($array['date']);
            $newformat  = date('Y-m-d',$time);
			$task->schedule_date = $newformat;
             //formate datetime to mysql time //to be revised
            $time_formated  = date("H:i:s", strtotime($array['time']));
            $task->schedule_time     = $time_formated;
            $task->save();

			//if ($task->save()) {
                //var_dump($array['templates'][0]);

                //$role = (new UserService)->taskTemplateDetails($array['templates'][0]);
                //
               // $template = $this->taskTemplateDetails(1);

            //    var_dump("here");
                //var_dump($template);
                //$assesment_templates = self::taskTemplateDetails($array['templates'][0]);
                //var_dump($assesment_templates);
			    //$template = $this->template->where('id', '=', $array['modules'])->first();

			// 	 $taskTaskTemplate = new TaskTemplates;
			// 	 $taskTaskTemplate->task_id = $task->id;
			// 	 $taskTaskTemplate->task_template_id = $template->id;
			// 	 //$taskTaskTemplate->save();
			//}
		}

        foreach( $array['assigned_user'] as $user ) {

			$task               = new Task;
            $task->title        = $array['title'];
            $task->assigned_to  = $user['uuid'];
            $task->uid          = $user['uuid'];
			$task->user_id      = $user['uuid'];
			$task->frequency    = $array['frequency'];
			$task->levels       = $array['levels'];
            $task->module       = $array['modules'];
            $task->category     = $array['category'];

            $task->assigned_type = 'User';

            //formate date to mysql date
            $time       = strtotime($array['date']);
            $newformat  = date('Y-m-d',$time);
			$task->schedule_date = $newformat;
             //formate datetime to mysql time //to be revised
            $time_formated  = date("H:i:s", strtotime($array['time']));
            $task->schedule_time     = $time_formated;
            $task->save();

			//if ($task->save()) {
                //var_dump($array['templates'][0]);

                //$role = (new UserService)->taskTemplateDetails($array['templates'][0]);
                //
               // $template = $this->taskTemplateDetails(1);

            //    var_dump("here");
                //var_dump($template);
                //$assesment_templates = self::taskTemplateDetails($array['templates'][0]);
                //var_dump($assesment_templates);
			    //$template = $this->template->where('id', '=', $array['modules'])->first();

			// 	 $taskTaskTemplate = new TaskTemplates;
			// 	 $taskTaskTemplate->task_id = $task->id;
			// 	 $taskTaskTemplate->task_template_id = $template->id;
			// 	 //$taskTaskTemplate->save();
			//}
		}
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
        var_dump($taskTemplateId);
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

        if ($array['modules'] !== false && $array['category'] !== false ) {
			$template = $this->template->where('task_category_id', '=', $array['category']);
		}

		return new TaskTemplateCollection($template->get());
	}

    /**
	 * This function get all tasks template
	 * @param  array  $params [description]
	 * @return [type]         [description]
	 */
	// public function getTasksList(array $array) {

	// 	$task = $this->tasks;

	// 	// if ($array['modules'] !== false ) {
	// 	// 	$template = $this->template->where('task_component_id', '=', $array['modules']);
	// 	// }

	// 	// if ($array['category'] !== false ) {
	// 	// 	$template = $this->template->where('task_category_id', '=', $array['category']);
	// 	// }

	// 	return new TasksListCollection($task->get());
	// }

    /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTasksList() {
		//return Response::json((new Task)->all());
        return Response::json((new Task)->orderBy('created_at', 'desc')->get());
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
	 * **************************************************************
	 * This function gets task by user type
	 * **************************************************************
	 * @param   string $typeId type id eg user or team
     * @param   string $userId user Id for assign to
     * @param   string $roleDI unique role id
	 * @return  array        list role details
	 */
	public function getTaskByType($typeId, $userId, $roleId) {

		$tasks = new Task;
        if($typeId == 'team'){
            $list = $tasks->where('assigned_to', '=', $roleId);
        } else {
            $list = $tasks->where('assigned_to', '=', $userId);
        }

		return new RoleResource($list);
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
