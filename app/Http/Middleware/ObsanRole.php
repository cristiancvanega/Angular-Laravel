<?php

namespace App\Http\Middleware;

use Closure;

class ObsanRole extends BaseRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->isObsan() && !$this->isAdmin())
            return response()->json([
                'message' => 'You do no have permissions to access'
            ], 405);

        return $next($request);
    }
}
