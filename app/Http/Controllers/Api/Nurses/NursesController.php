<?php

namespace App\Http\Controllers\Api\Nurses;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Nurses\StoreNurseRequest;
use App\Http\Requests\Nurses\UpdateNurseRequest;
use App\Http\Resources\Nurses\NurseResource;
use App\Repositories\Nurses\NursesRepository;
use Illuminate\Http\Request;

class NursesController  extends BaseController
{
    private $nurseRepository;
    
    public function __construct(NursesRepository $nurseRepository)
    {
        $this->nurseRepository = $nurseRepository;
    }

    public function index(Request $request) 
    {
        $filters = $request->all();

        $nurses = $this->nurseRepository->getAll($filters);

        return $this->sendResponse(NurseResource::collection($nurses));

    }

    public function store(StoreNurseRequest $request)
    {
        $input = $request->all();

        $nurse = $this->nurseRepository->save($input);

        return $this->sendResponse(new NurseResource($nurse));
    }

    public function update($id, UpdateNurseRequest $request)
    {
        $input = $request->all();

        $nurse = $this->nurseRepository->update($id, $input);

        return $this->sendResponse(new NurseResource($nurse));
    }

    public function show($id) {

        $nurse = $this->nurseRepository->getById($id);

        return $this->sendResponse(new NurseResource($nurse));
    }

    public function delete($id) {

        if ($this->nurseRepository->delete($id)) {
            return $this->sendSuccess('Nurse deleted successfully');
        }

        return $this->sendError('Unable to delete nurse');
    }
}

