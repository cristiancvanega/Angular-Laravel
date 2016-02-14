<?php

namespace App\Http\Controllers;

use App\Obsan\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserLogInRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticateController extends Controller
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function authenticate(UserLogInRequest $request)
    {
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($request->toArray())) {
                return json_encode(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return json_encode(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return json_encode([
            'token' => $token,
            'role' => $this->repository->getRoleUserWithToken($token)
        ]);
    }

    public function getAuthenticatedUser()
    {
        return $this->getAUser(request()->header('token'));
    }

    public function getAUser($token)
    {
        try {
            JWTAuth::setToken($token);

            if (!$user = JWTAuth::authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function testMiddleware()
    {
        return response()->json(['message' => 'funciona']);
    }

    public function success()
    {
        return response()->json(['message' => 'success'], 200);
    }
}
