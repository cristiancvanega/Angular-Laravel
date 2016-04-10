<?php

namespace App\Http\Middleware;

use App\Obsan\Repositories\UserRepository;
use Closure;
use Illuminate\Http\Request;

class BaseRole
{
    protected $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    protected function isValidUser()
    {

    }

    protected function isAdmin($request)
    {
        $request->attributes->add(['user_id' => $this->userRepository->getIdUser()]);
        return $this->userRepository->getRoleUser() === 'Admin';
    }

    protected function isObsan()
    {
        if ($this->userRepository->getRoleUser() === 'OBSAN')
            return true;
        else
            return false;
    }
}
