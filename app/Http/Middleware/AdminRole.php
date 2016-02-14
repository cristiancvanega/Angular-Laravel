<?php

namespace App\Http\Middleware;

use Closure;

class AdminRole extends BaseRole
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
        if(!$this->isAdmin())
            return redirect('obsan-web');

        return $next($request);
    }
}
