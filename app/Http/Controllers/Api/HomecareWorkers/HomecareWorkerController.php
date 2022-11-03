<?php

namespace App\Http\Controllers\Api\HomecareWorkers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\HomecareWorkers\StoreHomecareWorkerRequest;
use App\Http\Requests\HomecareWorkers\UpdateHomecareWorkerRequest;
use App\Http\Resources\HomecareWorkers\HomecareWorkerResource;
use App\Repositories\HomecareWorkers\HomecareWorkerRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomecareWorkerController extends BaseController
{
    private $hcwRepository;
    
    public function __construct(HomecareWorkerRepository $hcwRepository)
    {
        $this->hcwRepository = $hcwRepository;
    }

    public function index(Request $request) 
    {
        $filters = $request->all();

        $HCWs = $this->hcwRepository->getAll($filters);

        return $this->sendResponse(HomecareWorkerResource::collection($HCWs));

    }

    public function store(StoreHomecareWorkerRequest $request)
    {
        $input = $request->all();

        $hcw = $this->hcwRepository->save($input);

        return $this->sendResponse(new HomecareWorkerResource($hcw));
    }

    public function update($id, UpdateHomecareWorkerRequest $request)
    {
        $input = $request->all();

        $hcw = $this->hcwRepository->update($id, $input);

        return $this->sendResponse(new HomecareWorkerResource($hcw));
    }

    public function show($id) {

        $hcw = $this->hcwRepository->getById($id);

        return $this->sendResponse(new HomecareWorkerResource($hcw));
    }

    public function delete($id) {

        if ($this->hcwRepository->delete($id)) {
            return $this->sendSuccess('Homecare Worker deleted successfully');
        }

        return $this->sendError('Unable to delete homecare worker');
    }
}
