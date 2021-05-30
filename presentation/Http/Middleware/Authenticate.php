<?php

namespace Presentation\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;
use Presentation\Http\Actions\BaseAction;

class Authenticate extends BaseAction
{
    public function handle($request, Closure $next)
    {
        if (! $request->user()) {
            return Response::json(['message' => 'Not logged in'], 401);
        }

        return $next($request);
    }
}
