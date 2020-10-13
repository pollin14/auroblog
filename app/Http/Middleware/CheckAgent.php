<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class CheckAgent
{
    const MINIMUM_IE_VERSION = 11;
    /**
     * @var Agent
     */
    private $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->agent->setUserAgent($request->userAgent());
        $this->agent->setHttpHeaders($request->headers);

        $browser = $this->agent->browser();
        if ($this->agent->is('IE')) {
            $version = $this->agent->version($browser);
            intval($version);
            if ($version < self::MINIMUM_IE_VERSION) {
                return redirect('https://browsehappy.com/');
            }
        }

        return $next($request);
    }
}
