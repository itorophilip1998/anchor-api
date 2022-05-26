<?php 
namespace App\Services\Incident;

use App\Models\ActivityRecommendation;

class RecommendationService {

	/**
	 * this function get activiy's recommendation
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function index($id) {
		return (new ActivityRecommendation)->orderBy('id', 'desc')->where('activity_id', '=', $id)->get();
	}

	/**
	 * This function store recommendation base on the activity selected
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function store_recommendation(array $array) {

		$recom = new ActivityRecommendation;
		$recom->activity_id = $array['activity_id'];
		$recom->recommendation = $array['recommendation'];
		$recom->save();

		if ( $recom->save() ) {
			return [
				'status' => true
			];
		}
	}

	public function saveSelectRecommendation( array $array) {

		$recommendation = new SelectedRecommendation;
		$recommendation->incident_id = $array['incident_id'];
		$recommendation->activity_id = $array['activity_id'];
		$recommendation->recommendation = $array['recommendation'];
		$recommendation->recommendation_id = $array['recommendation_id'];
		$recommendation->save();

		if ( $recommendation->save()) {
			return true;
		}

		return false;
	}
}

 ?>