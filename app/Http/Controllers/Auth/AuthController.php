<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\CafafansApiJsonResponse;
use App\Traits\CafafansRestApiClientService;

class AuthController extends Controller
{
    use CafafansApiJsonResponse, CafafansRestApiClientService;

    private $baseUri;
    private $grantType;
    private $clientId;
    private $clientSecret;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->grantType     = env('auth.credentials.grant_type');
        // $this->clientId      = env('auth.credentials.client_id');
        // $this->clientSecret  = env('auth.credentials.client_secret');
        $this->baseUri       = 'http://127.0.0.1:8081';
        $this->grantType     = 'password';
        $this->clientId      = 2;
        $this->clientSecret  = 'tOOPU73brhrDpqCZxYWVWtxT2pMyazJ8UAImP1T2';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {

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

        $data = [
            'grant_type'    => $this->grantType ,
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'username' => $user->username,
            'password' => $user->password,
        ];
        return $data;

        //Make http request

        $response = $this->httpRequest('POST', '/test', $data);

        return $response;

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
