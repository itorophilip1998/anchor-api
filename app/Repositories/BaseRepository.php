<?php 
namespace App\Repositories;

class BaseRepository {
    
    public function sendResponse($result, $message = '')
    {
        return response()->json([
            'success' => true,
            'data' => $result,
            'message' => $message
        ]);
    }

    public function sendError($error, $data = [], $code = 200)
    {
        $res = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return response()->json($res, $code);
    }

    public function sendSuccess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}