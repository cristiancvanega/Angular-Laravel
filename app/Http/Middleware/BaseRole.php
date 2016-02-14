<?php

namespace App\Http\Middleware;

use App\Obsan\Repositories\UserRepository;
use Closure;

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

    protected function isAdmin()
    {
        return $this->userRepository->getRoleUser() == 'Admin';
    }

    protected function isObsan()
    {
        return $this->userRepository->getRoleUser() == 'Obsan';
    }
}
