<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Task\TaskService;

class TaskController extends Controller
{

    private $taskmodel;

    public function __construct(TaskService $taskservice) {
        $this->taskmodel = $taskservice;
    }

    /**
     * *************************************************
     * This function get all tasks
     * *************************************************
     * @return [type] [description]
     * *************************************************
     */
    public function index() {}

    public function store(Request $request) {

       $attributes = $request->all();
       return $this->taskmodel->scheduleTask($attributes);
    }

    public function storeEscalation(Request $request) {

        $attributes = $request->all();
        return $this->taskmodel->escalateTask($attributes);
    }

    public function indexTaskTemplate (Request $request) {
        $attributes = $request->all();
        return $this->taskmodel->getAllTaskTemplate($attributes);
    }

    public function taskslist () {
        return $this->taskmodel->getTasksList();
    }

    public function taskselected ($id) {
        return $this->taskmodel->getTasksSelected($id);
    }

    public function taskitemopen ($id) {
        return $this->taskmodel->getTaskOpenItem($id);
    }

    public function taskitemcomplete($id) {
        return $this->taskmodel->getTaskCompletedItem($id);
    }

    public function taskitemoverdue ($id) {
        return $this->taskmodel->getTaskOverdue($id);
    }

    public function subtaskselected ($id) {
        return $this->taskmodel->getTasksSubSelected($id);
    }

    public function taskTemplateDetails($id) {
        return $this->taskmodel->taskTemplateDetails($id);
    }

    public function taskModules () {
        return $this->taskmodel->getTaskModules();
    }

    public function taskCategories() {
        return $this->taskmodel->getTaskCategories();
    }

    public function taskFieldTemplate() {
        return $this->taskmodel->getTaskFieldTemplate();
    }

    public function taskFieldGenerate($id) {
        return $this->taskmodel->generateTaskFieldById($id);
    }

    public function taskFieldDetails($id) {
        return $this->taskmodel->getFieldDetails($id);
    }
}
