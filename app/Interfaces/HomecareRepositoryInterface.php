<?php
namespace App\Interfaces;


Interface HomecareRepositoryInterface {

	public function getHomecareworkers(array $array);
	public function getHomecareworkerById($hcworkerId);
	public function addHomecareWorker(array $params);
	public function updateHomecareworker($hcworkId, array $newDetails );
}
?>