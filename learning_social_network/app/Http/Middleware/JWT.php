<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;


class JWT
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
         //JWTAuth::parseToken()->authenticate();
        {
            if ($request->has('token')) {
                try {
                    $this->auth = JWTAuth::parseToken()->authenticate();
                    return $next($request);
                } catch (JWTException $e) {
                    return redirect()->route('/api/auth/logout');
                }
            }
        }
       // JWTAuth::toUser(JWTAuth::getToken());
        //echo $test;die();

        //return $next($request);

    }
}
