<?php
namespace App\Services\Task;

use App\Models\Task;
use App\Models\TaskItem;
use App\Models\TaskSubItem;
use App\Models\TaskDraft;
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

    public function escalateTask(array $array) {

        $update_record = [];

        if($array['type'] == 'subtask'){
            //get sub item record
            $update_record = TaskSubItem::find($array['id']);

            $update_record->escalated_to = $array['reason'];
            $data = date('Y-m-d H:i:s', strtotime($array['date']));

            // $update_record->escalated_by
            $update_record->escalation_date = $data;
            $update_record->escalation_reason = $array['reason'];
            $update_record->isEscalation = 1;
            $update_record->escalation_comment = $array['comments'];

            if($update_record->save()){
                //TODO::create notification

            }

        } else {

            $update_record = TaskItem::find($array['id']);
            $update_record->escalated_to = $array['reason'];

            $data = date('Y-m-d H:i:s', strtotime($array['date']));

            // $update_record->escalated_by
            $update_record->escalation_date = $data;
            $update_record->escalation_reason = $array['reason'];
            $update_record->isEscalation = 1;
            $update_record->escalation_comment = $array['comments'];
            $update_record = [];
        }

        // $details = TaskField::find($id);

        // $update = Task::where('incident_id', '=', $this->get_incident_id($array['incident_id']))->first();
		// $update->reason = $array['reason'];
		// $update->save();

        return [
			'status' => true,
		];
    }

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

            //to be re-added
            // if(count($array['client'])){
            //     $task->assigned_client_id = $array['client'][0]['id'];
            // }

            $task->save();

			if ($task->save()) {
                $task_item = new TaskItem;
                $task_item->linked_template_id = $array['templates'][0];
                $task_item->linked_task_id = $task->id;
                $task_item->title = $array['title'];
                $task_item->assigned_to = $role['id'];
                $task_item->assigned_type = 'Role';
                $task_item->status = 'Open';
                $task_item->save();

                //add sub_task
                if ($task_item->save()) {
                    $task_sub_item = new TaskSubItem;
                    $task_sub_item->linked_task_item_id = $task_item->id;
                    $task_sub_item->title = "Form 1";
                    $task_sub_item->assigned_to = $role['id'];
                    $task_sub_item->assigned_type = 'Role';
                    $task_sub_item->link_type = 'Item';
                    $task_sub_item->status = 'Open';
                    $task_sub_item->save();
                }
			}
		}

        // foreach( $array['assigned_user'] as $user ) {

		// 	$task               = new Task;
        //     $task->title        = $array['title'];
        //     $task->assigned_to  = $user['uuid'];
        //     $task->uid          = $user['uuid'];
		// 	$task->user_id      = $user['uuid'];
		// 	$task->frequency    = $array['frequency'];
		// 	$task->levels       = $array['levels'];
        //     $task->module       = $array['modules'];
        //     $task->category     = $array['category'];

        //     $task->assigned_type = 'User';

        //     //formate date to mysql date
        //     $time       = strtotime($array['date']);
        //     $newformat  = date('Y-m-d',$time);
		// 	$task->schedule_date = $newformat;
        //      //formate datetime to mysql time //to be revised
        //     $time_formated  = date("H:i:s", strtotime($array['time']));
        //     $task->schedule_time     = $time_formated;
        //     $task->save();

		// 	//if ($task->save()) {
        //         //var_dump($array['templates'][0]);

        //         //$role = (new UserService)->taskTemplateDetails($array['templates'][0]);
        //         //
        //        // $template = $this->taskTemplateDetails(1);

        //     //    var_dump("here");
        //         //var_dump($template);
        //         //$assesment_templates = self::taskTemplateDetails($array['templates'][0]);
        //         //var_dump($assesment_templates);
		// 	    //$template = $this->template->where('id', '=', $array['modules'])->first();

		// 	// 	 $taskTaskTemplate = new TaskTemplates;
		// 	// 	 $taskTaskTemplate->task_id = $task->id;
		// 	// 	 $taskTaskTemplate->task_template_id = $template->id;
		// 	// 	 //$taskTaskTemplate->save();
		// 	//}
		// }
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
	 * This function convert subtask form to draft
	 * @param  array  $params [description]
	 * @return [type]         [description]
	 */
	public function convertToDraft(array $array) {

        //$task_sub_item = new TaskSubItem;

        $update_record = TaskSubItem::find($array['id']);
        $update_record->isDraft = 1;

        //TODO::Store draft
        //$update_record->form_response = $array;
        $update_record->save();

        //TaskSubItem::
        //$draft = new TaskDraft;
        //$draft->related_sub_task_id = $array['id'];

        // foreach ($array['form_items'] as $key => $value){
        //     if(!($value)){
        //         var_dump($form_item['value']);
        //     }
        // }

        // foreach( $array['form_items'] as $form_item ) {

        //     if($form_item['value']){
        //         var_dump($form_item['value']);
        //     }
        // }
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
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTasksList() {
		//return Response::json((new Task)->all());
        return Response::json((new Task)->orderBy('created_at', 'desc')->get());
	}

    /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTasksSelected($id) {
        return Response::json((new Task)->where('id', '=', $id)->orderBy('created_at', 'desc')->first());
	}

    /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTaskOpenItem($id) {
        return Response::json((new TaskItem)->where('linked_task_id', '=', $id)->where('status', '=', "Open")->orderBy('created_at', 'desc')->get());
	}

     /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTaskCompletedItem($id) {
        return Response::json((new TaskItem)->where('linked_task_id', '=', $id)->where('status', '=', "Complete")->orderBy('created_at', 'desc')->get());
	}

     /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTaskOverdue($id) {
        return Response::json((new TaskItem)->where('linked_task_id', '=', $id)->where('status', '=', "Overdue")->orderBy('created_at', 'desc')->get());
	}


     /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTasksSubAll($id) {
        return Response::json((new TaskSubItem)->where('linked_task_item_id', '=', $id)->where('status', '=', "Open")->orderBy('created_at', 'desc')->get());
	}

    /**
	 * [getOpenSubTasks description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getOpenSubTasks($id) {
		//return $users =  User::role($name)->get();
        return Response::json((new TaskSubItem)->where('linked_task_item_id', '=', $id)->where('status', '=', "Open")->orderBy('created_at', 'desc')->get());

		//return $users =TaskSubItem::select('id','uid')->where('name', '=', $name)->first();
	}

    /**
	 * [getCompletedSubTasks description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getCompletedSubTasks( $name ) {
		//return $users =  User::role($name)->get();
		return $users =TaskSubItem::select('id','uid')->where('name', '=', $name)->first();
	}

    /**
	 * [getEscalatedSubTasks description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getEscalatedSubTasks( $name ) {
		//return $users =  User::role($name)->get();
		return $users =Role::select('id','uid')->where('name', '=', $name)->first();
	}

     /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTasksSubSelected($id) {
        return Response::json((new TaskSubItem)->where('id', '=', $id)->where('status', '=', "Open")->orderBy('created_at', 'desc')->first());
	}

     /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
	public function getTasksSubRelated($id) {
        $selected = (new TaskSubItem)->where('id', '=', $id)->first();
        $related_sub_tasks = TaskSubItem::where('linked_task_item_id', '=', $selected->linked_task_item_id)->where('status', '=', "Open")->orderBy('created_at', 'desc')->get();
        return Response::json($related_sub_tasks);
	}

    /**
	 * THIS FUNCTION GET ALL MODULES FOR TASK
	 * @return [type] [description]
	 */
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
