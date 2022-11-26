<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if (auth()->guest()) {
            return redirect(route('client.login'));
        }

        $rule = auth()->user()->rule;

        abort_if($rule !== 'admin' && $rule !== 'restaurant', Response::HTTP_FORBIDDEN);

        return $next($request);
    }
}
