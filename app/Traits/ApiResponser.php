<?php 
namespace App\Traits;

use Carbon\Carbon;

/*
\----------------------------------------------------------------
\ Api Responser Trait
\----------------------------------------------------------------
 */

trait ApiResponser
{
	
	/**
	 * Return success JSON response
	 * @param  [type]      $data    [description]
	 * @param  string|null $message [description]
	 * @param  int|integer $code    [description]
	 * @return [type]               [description]
	 */
	public function success($data, string $message = null, int $code = 200) 
	{
	    return response()->json([
			'status' => 'Success',
			'message' => $message,
			'data' => $data
		], $code);
	}

	protected function error(string $message = null, int $code, $data = null)
	{
		return response()->json([
			'status' => 'Error',
			'message' => $message,
			'data' => $data
		], $code);
	}


}

?>