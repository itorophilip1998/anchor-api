<?php 
namespace App\Services\Complaint;

use App\Models\ComplaintType;
use Response;

class ComplaintCategoryTypeService {

	private $model;

	public function __construct(ComplaintType $type) {
		$this->model = $type;
	}

	public function index () {
		return Response::json($this->model->get());
	}

	public function store( array $array, $id) {

		$type = new ComplaintType;
		$type->name = $array['name'];
		$type->category_id = $id;
		$type->level = 3; // i dont know what level is, added to make it save
		$type->save();

		if ( $type->save()) {
			return ['created' => true ];
		}

		return ['created' => false];
	}

	public function update(array $array, $id) {

		$type = ComplaintType::find($id);

		$type->name = $array['name'];
		$type->category_id =$array['category_id'];
		$type->save();

		if ( $type->save()) {
			return ['updated' => true ];
		}

		return ['updated' => false];
	}

	public function delete($id) {
		
		$type = ComplaintType::find($id);

		if ($type->delete()) {
			return ['deleted' => true];
		}

		return ['deleted' => false];
	}

	/**
	 * [getComplaintTypeByCategoryId description]
	 * @param  [type] $category_id [description]
	 * @return [type]              [description]
	 */
	public function getComplaintTypeByCategoryId( $category_id ) {
		return Response::json($this->model->where('category_id', '=', $category_id)->get());
	}

	/**
	 * [getAllComplaintCategoryTypes description]
	 * @return [type] [description]
	 */
	public function getAllComplaintCategoryTypes() {
		return Response::json($this->model/**->orderBy('id', 'desc')*/->get());
	}

}


 ?>