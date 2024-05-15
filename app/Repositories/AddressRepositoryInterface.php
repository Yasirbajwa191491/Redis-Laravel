<?php
// app/Repositories/AddressRepositoryInterface.php

namespace App\Repositories;

interface AddressRepositoryInterface
{
    public function searchByPostcode(string $postcode);
    public function searchByAddress(string $address);
}
