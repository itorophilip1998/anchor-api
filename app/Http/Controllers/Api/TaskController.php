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

    public function indexTaskTemplate (Request $request) {
        $attributes = $request->all();
        return $this->taskmodel->getAllTaskTemplate($attributes);
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
