<?php

namespace App\Repositories;

interface IpAddressRepositoryInterface
{
    public function findByIp(string $ip);
    public function incrementRequestCount(string $ip);
    public function resetDailyRequests();
    public function resetMonthlyRequests();
}

?>