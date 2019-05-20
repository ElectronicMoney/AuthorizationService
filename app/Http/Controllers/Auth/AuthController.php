<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\CafafansApiJsonResponse;

class AuthController extends Controller
{
    use CafafansApiJsonResponse;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {

        return "Login";
        //The rules
        $rules = [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];
        //validate the request
       $this->validate($request, $rules);
        //instantiate the User
        $user = new User();

        $user->username = $request->input('username');
        $user->password = $request->input('password');



    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) {
        //The rules
        $rules = [
            'name'     => 'required|max:255',
            'username' => 'required|max:255',
            'email'    => 'required|max:255',
            'password' => 'required|max:255',
        ];
        //validate the request
       $this->validate($request, $rules);
        //instantiate the User
        $user = new User();
        $user->name     = $request->input('name');
        $user->username = $request->input('username');
        $user->email    = $request->input('email');
        $user->password     = $request->input('password');
        //Save the user
        $user->save();
        //Return the new user
        return $this->successResponse($user, Response::HTTP_CREATED);

    }


}
