<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExaminerMiddleware
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

        try {
            $user = JWTAuth::parseToken()->authenticate() ;
//            dd($user->group->name);
            $group = $user->group->name;
            if ($group != "examiner"){
                return response()->json([
                    'error' => 'User Not Authorized',
                ], 200);
            }
        }
        catch (TokenExpiredException $e) {

            return response()->json([
                'error' => 'Token Expired!',
            ], 200);

        } catch (TokenInvalidException $e) {
            return response()->json([
                'error' => 'Not Authorized!',
            ], 200);

        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Not Authorized!',
            ], 200);
        }
        return $next($request);
    }
}
