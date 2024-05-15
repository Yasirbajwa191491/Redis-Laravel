<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveAddressImported extends Model
{
    use HasFactory;
    protected $table = 'live_addresses_imported';
    protected $fillable = [
        'outcode', 'postcode', 'fulladdress', 'line1', 'line2', 
        'category', 'iconpath', 'latitude', 'longitude', 'code', 
        'iata', 'icao', 'created', 'post_code_id'
    ];
}


// CREATE INDEX idx_postcode ON live_addresses_imported(postcode);
// CREATE INDEX idx_fulladdress ON live_addresses_imported(fulladdress);
