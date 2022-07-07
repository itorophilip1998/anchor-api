<?php 
namespace App\Services\Task;

use App\Models\Task;
use App\Models\TaskTemplate;
use App\Models\TaskComponent;
use App\Models\TaskCategory;
use App\Models\TaskFieldTemplate;

use App\Http\Resources\Task\TaskResource;
use App\Http\Resources\Task\TaskCollection;
use App\Http\Resources\Task\TaskTemplateResource;
use App\Http\Resources\Task\TaskTemplateCollection;

use App\Services\Task\TaskTemplates;

use Response;

class TaskService {

   protected $template;

	public function __construct(TaskTemplate $tasktemplate) {
	   $this->template = $tasktemplate;
	}

	public function index() {

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
		return Response::json($details);
	}

}


 ?>