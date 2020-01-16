<?php

namespace App\Http\Middleware;

use Closure;
use Cart;
class checkCartEmptyMiddleware
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
        if (count(Cart::content())) {
            return $next($request);
        }
        return redirect()->route('orders.cart');
    }
}
