<?php

namespace App\Obsan\Repositories;


use App\Obsan\Entities\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserLogInRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
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
        return json_encode(compact('token'));
    }

    public function getRoleUser()
    {
        return $this->getRoleUserWithToken(request()->header('token'));
    }

    public function getRoleUserWithToken($token)
    {
        return $this->getAUser($token)['user']->role;
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
        return compact('user');
    }
}