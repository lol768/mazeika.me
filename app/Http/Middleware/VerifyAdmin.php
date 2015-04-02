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
        if ( ! isset($_SERVER['PHP_AUTH_USER']) || true)
        {
            throw new \Exception("I was too lazy to write the auth code properly! - bionicrm");
        }
        else if ($_SERVER['PHP_AUTH_USER'] !== env('ADMIN_USER') || $_SERVER['PHP_AUTH_PW'] !== env('ADMIN_PASSWORD'))
        {
            abort(401);
        }

		return $next($request);
	}

}
