<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Complaint\ComplaintService;
use App\Services\Complaint\ComplaintCategoryService;
use App\Services\Complaint\ComplaintCategoryTypeService;


class ComplaintController extends Controller
{
    
    private $complaint;
    private $category;
    private $type;

    public function __construct(ComplaintService $complainservice, ComplaintCategoryService $complaintcategory, ComplaintCategoryTypeService $complaintcategorytype ) {
        $this->complaint = $complainservice;
        $this->category = $complaintcategory;
        $this->type = $complaintcategorytype;
    }


    public function index(Request $request) {

        $attributes = $request->all();
        return $this->complaint->index();
    }
    /**
     * **********************************************************
     * THIS FUNCTION IS USE TO GET ALL CATEGORIES
     * **********************************************************
     * @return [type] [description]
     */
    public function getAllCategory() {
        return $this->category->index();
    }

    /**
     * **********************************************************
     * THIS FUNCTION IS USE TO CREATE A COMPLAINT
     * **********************************************************
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request ) {  

        $attributes = $request->all();
        return $this->complaint->store($attributes);
    }

    /**
     * **********************************************************
     * THIS FUNCTION IS USE TP CREATE A COMPLAINT CATEGORY
     * **********************************************************
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeCategory( Request $request) {

        $attributes= $request->all();
        return $this->category->store($attributes);
    }

    /**
     * **********************************************************
     * THIS FUNCTION IS USE TO UPDATE A COMPLAINT CATEGORY
     * **********************************************************
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateCategory($id, Request $request) {

        $attributes = $request->all();
        return $this->category->update($attributes);
    }

    /**
     * *************************************************************
     * THIS FUNCTION CREATE A NEW CATEGORY TYPE USE THE CATEGORY ID 
     * *************************************************************
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function storeCategoryType(Request $request, $id) {

        $attributes = $request->all();
        return $this->type->store($attributes, $id);
    }

    /**
     * ***********************************************************
     * this function get complaint category type by category id
     * ***********************************************************
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getComplaintType( $id ) {
        return $this->type->getComplaintTypeByCategoryId($id);
    }

    /**
     * *********************************************************
     * this function get all complait category types
     * *********************************************************
     * @return [type] [description]
     */
    public function fetchAllCategoryType() {
        return $this->type->getAllComplaintCategoryTypes();
    }

    /**
     * *********************************************************
     * This function get complaint details 
     * *********************************************************
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show( $id ) {
        $detailId = $id;
        return $this->complaint->details( $detailId ); 
    }

    /**
     * [saveActionResponse description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function saveActionResponse(Request $request) {

        $attributes = $request->all();
        return $this->complaint->saveActionResponse($attributes);

    }

    public function saveInvestigationResponse(Request $request) {

        $attributes = $request->all();
        return $this->complaint->saveComplaintResponse($attributes);
    }
    

}
