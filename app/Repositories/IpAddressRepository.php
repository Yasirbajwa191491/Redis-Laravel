<?php
namespace App\Repositories;

use App\Models\IpAddress;

class IpAddressRepository implements IpAddressRepositoryInterface
{
    public function findByIp(string $ip)
    {
        return IpAddress::where('ip', $ip)->first();
    }

    public function incrementRequestCount(string $ip)
    {
        $ipAddress = $this->findByIp($ip) ?? new IpAddress(['ip' => $ip]);
        $ipAddress->daily_requests++;
        $ipAddress->monthly_requests++;
        $ipAddress->save();
    }

    public function resetDailyRequests()
    {
        IpAddress::query()->update(['daily_requests' => 0]);
    }

    public function resetMonthlyRequests()
    {
        IpAddress::query()->update(['monthly_requests' => 0]);
    }
}

?>