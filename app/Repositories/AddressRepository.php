<?php
// app/Repositories/AddressRepository.php

namespace App\Repositories;
use App\Models\LiveAddressImported;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
class AddressRepository implements AddressRepositoryInterface
{
    public function searchByPostcode(string $postcode)
    {
        
        try {
            $key = "search_by_postcode_{$postcode}";
    $addresses = Redis::get($key);

    if ($addresses) {
        Log::info("Retrieved addresses from Redis for postcode: {$postcode}");
        return json_decode($addresses);
    } else {
        Log::info("No addresses found in Redis for postcode: {$postcode}, querying database.");
    }

    $addresses = LiveAddressImported::where('postcode', 'LIKE', "%{$postcode}%")->limit(5)->get();
    Redis::setex($key, 3600, json_encode($addresses));
    Log::info("Stored addresses in Redis for postcode: {$postcode}");

    return $addresses;
        } catch (\Throwable $e) {
            Log::error('Unhandled Exception: ' . $e->getMessage());
            return $e->getMessage();
        }
      
    }

    public function searchByAddress(string $address)
    {
        try {
            $key = "search_by_address_{$address}";
    $addresses = Redis::get($key);

    if ($addresses) {
        Log::info("Retrieved addresses from Redis for address: {$address}");
        return json_decode($addresses);
    } else {
        Log::info("No addresses found in Redis for postcode: {$address}, querying database.");
    }

    $addresses = LiveAddressImported::where('fulladdress', 'LIKE', "%{$address}%")->limit(5)->get();
    Redis::setex($key, 3600, json_encode($addresses));
    Log::info("Stored addresses in Redis for address: {$address}");

    return $addresses;
        } catch (\Throwable $e) {
            Log::error('Unhandled Exception: ' . $e->getMessage());
            return $e->getMessage();
        }
        
    }

    public function fetchAllAddresses()
    {
        $key = 'all_addresses';
        $addresses = Redis::get($key);

        if ($addresses) {
            Log::info("Retrieved all addresses from Redis.");
            return json_decode($addresses, true);
        }

        Log::info("No all addresses found in Redis, querying database.");
        $addresses = LiveAddressImported::all();
        Redis::setex($key, 3600, json_encode($addresses));
        Log::info("Stored all addresses in Redis.");

        return $addresses;
    }
}
