<?php 
namespace App\Services\Complaint;

use App\Models\ComplaintCategory;
use Response;

class ComplaintCategoryService {

	private $complaintcategory;

	public function __construct(ComplaintCategory $complaintcategory) {
		$this->complaintcategory = $complaintcategory;
	} 

	public function index() {
		return Response::json($this->complaintcategory->get());
	}

	public function store(array $request) {

		$category = new ComplaintCategory;
		$category->name = $request['name'];
		$category->save();

		if ( $category->save() ) {
			return [ 'created' => true ];
		}

		return [ 'created' => false];
	}

	public function update( $id, array $array) {

		$category = $this->complaintcategory->find($id);
		$category->name = $array['name'];
		$category->update();

		if ( $category->update() ) {
			return [ 'update' => true ];
		}

		return [ 'update' => false ];
	}

	public function delete( $id) {

		$category = $this->complaintcategory->find($id);
		
		$category->delete();

		if ( $category->delete() ) {
			return [ 'deleted' => true ];
		}

		return [ 'deleted' => false ];
	}

}


 ?>