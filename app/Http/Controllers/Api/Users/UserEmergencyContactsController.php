<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Users\StoreEmergencyContactRequest;
use App\Http\Requests\Users\UpdateEmergencyContactRequest;
use App\Http\Resources\Users\UserEmergencyContactResource;
use App\Repositories\Users\UserEmergencyContactRepository;

class UserEmergencyContactsController extends BaseController
{

    private $contactRepository;
    
    public function __construct(UserEmergencyContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
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
    public function store(StoreEmergencyContactRequest $request)
    {
        $input = $request->all();

        $contact = $this->contactRepository->save($input);

        return $this->sendResponse(new UserEmergencyContactResource($contact));
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
    public function update(UpdateEmergencyContactRequest $request, $id)
    {
        $input = $request->all();

        $contact = $this->contactRepository->update($id, $input);

        return $this->sendResponse(new UserEmergencyContactResource($contact));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contactRepository->delete($id);

        return $this->sendSuccess('Deleted');
    }
}
