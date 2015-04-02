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
        if ( ! isset($_SERVER['PHP_AUTH_USER']))
        {
            header('WWW-Authenticate: Basic realm="Restricted area"');
            header('HTTP/1.1 401 Unauthorized');
            abort(401);
        }
        else if ($_SERVER['PHP_AUTH_USER'] !== env('ADMIN_USER') || $_SERVER['PHP_AUTH_PW'] !== env('ADMIN_PASSWORD'))
        {
            abort(401);
        }

		return $next($request);
	}

}
