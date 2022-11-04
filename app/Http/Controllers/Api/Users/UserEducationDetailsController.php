<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Users\StoreEducationDetailRequest;
use App\Http\Requests\Users\UpdateEducationDetailRequest;
use App\Http\Resources\Users\UserEducationDetailResource;
use App\Repositories\Users\UserEducationDetailsRepository;

class UserEducationDetailsController extends BaseController
{

    private $educationDetailRepository;
    
    public function __construct(UserEducationDetailsRepository $educationDetailRepository)
    {
        $this->educationDetailRepository = $educationDetailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationDetailRequest $request)
    {
        $input = $request->all();

        $contact = $this->educationDetailRepository->save($input);

        return $this->sendResponse(new UserEducationDetailResource($contact));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationDetailRequest $request, $id)
    {
        $input = $request->all();

        

        $contact = $this->educationDetailRepository->update($id, $input);

        return $this->sendResponse(new UserEducationDetailResource($contact));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->educationDetailRepository->delete($id);

        return $this->sendSuccess('Deleted');
    }
}
