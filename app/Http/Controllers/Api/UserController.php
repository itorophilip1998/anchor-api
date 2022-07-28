<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Interfaces\UserRepositoryInterface;
use App\Services\User\UserService;

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
            'role' => '',
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    /**
     * THIS FUNCTION STORE ANY USER TO THE APPLICATION
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store( Request $request) {

        $attributes = $request->all();
        return (new UserService)->createUser($attributes);
    }

    /**
     * this function logout the user
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }

    /**
     * THIS FUNCTION GET USER DETAILS
     * @return [type] [description]
     */
    public function details() {
        // get logged in user id
        $userID = Auth::user()->uuid;
        return $this->userinterface->get_user_details($userID);
    }

    /**
     * This function get user rolese
     * @return [type] [description]
     */
    public function roles() {
        $userService = new UserService;
        return $userService->getUserRoles();
    }

    /**
     * ***********************************************
     * this function fole details
     * ************************************************
     * @param  [type] $roleId [description]
     * @return [type]         [description]
     */
    public function roleDetails($roleId) {

        $userService = new UserService;
        return $userService->getRoleById($roleId);
    }

    /**
     * THIS FUNCTION USER BY ROLE NAME
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function usersRole() {

        $rolename = 'Case Coordinator';
        $userService = new UserService;
        return $userService->getUserByRoleName($rolename);
    }
    

    public function all(Request $request) {
        $attributes = $request->all();
        return (new UserService)->getAllUser($attributes);
    }

}
