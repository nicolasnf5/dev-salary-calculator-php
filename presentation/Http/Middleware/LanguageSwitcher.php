<?php
declare(strict_types=1);

namespace Presentation\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LanguageSwitcher
{
    private Store $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle($request, Closure $next)
    {
        if (! $this->session->has('locale')) {
            $this->session->put('locale', Config::get('app.locale'));
        }

        App::setLocale($this->session->get('locale'));

        return $next($request);
    }
}
