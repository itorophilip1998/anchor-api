<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Interfaces\UserRepositoryInterface;

use App\Models\User;
use Auth;

class UserController extends Controller
{
    use ApiResponser;

    private $userinterface;

    public function __construct(UserRepositoryInterface $userinterface){
        $this->userinterface = $userinterface;
    }

    public function login(Request $request) 
    {
      $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'role' => Auth::user()->role->name,
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

     public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function details() {

        // get logged in user id
        $userID = Auth::user()->id;
        return $this->userinterface->get_user_details($userID);
    }

}
