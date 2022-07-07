<?php 
namespace App\Interfaces;

Interface ClientRepositoryInterface
{
	public function getAllClients(array $filter);
	public function getClientById($client_id);
	public function addClient(array $clientDetails);
	public function updateClient($clientId, array $newDetails);
	public function assignNurse(array $array);
	public function assignCoord(array $array);
	public function assignHomecareworker( array $array);
	public function unassign_nurse( array $array);
	public function unassign_coord( array $array);
	public function unassign_homecareworker( array $array);
}

?>