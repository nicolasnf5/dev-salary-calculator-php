<?php
declare(strict_types=1);

namespace Presentation\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ViewCommonsMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
