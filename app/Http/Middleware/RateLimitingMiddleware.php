<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\IpAddressRepositoryInterface;

class RateLimitingMiddleware
{
    protected $ipRepo;

    public function __construct(IpAddressRepositoryInterface $ipRepo)
    {
        $this->ipRepo = $ipRepo;
    }

    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $ipAddress = $this->ipRepo->findByIp($ip);
        if(!$ipAddress){
            return response()->json(['message' => 'Sorry you are not allowed'], 404);
        }
        if ($ipAddress && ($ipAddress->daily_requests >= 500 || $ipAddress->monthly_requests >= 2000)) {
            return response()->json(['message' => 'API limit exceeded'], 429);
        }

        $this->ipRepo->incrementRequestCount($ip);

        return $next($request);
    }
}

