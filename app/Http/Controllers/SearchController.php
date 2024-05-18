<?php

// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use App\Repositories\AddressRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $addressRepo;

    public function __construct(AddressRepositoryInterface $addressRepo)
    {
        $this->addressRepo = $addressRepo;
    }
    public function storeIp(Request $request)
    {
        $ip =$request->get('ip_address');
        // Assuming you have a model called IpAddress and a table to store IPs
        IpAddress::create(['ip' => $ip]);
        return response()->json(['message' => 'IP stored successfully']);
    }
    
    public function search(Request $request)
    {
        $input = $request->input('query');
        if (empty($input)) {
            return response()->json([]);
        }
    
        $formattedInput = formatUKPostcode($input);

        // Check if input is a valid UK postcode
        if ($formattedInput) {
             // Search by postcode
             $results = $this->addressRepo->searchByPostcode($formattedInput);
        } else {
           $results = $this->addressRepo->searchByAddress($input); 
        }

         return response()->json($results);
    }
}

