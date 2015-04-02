<?php namespace Mazeikame\Http\Middleware;

use Closure;

class VerifyAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ($request->input('password') !== env('ADMIN_PASSWORD'))
        {
            abort(401);
        }

		return $next($request);
	}

}
