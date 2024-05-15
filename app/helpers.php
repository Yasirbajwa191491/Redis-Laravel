<?php



function formatUKPostcode($postcode)
{
    $postcode = strtoupper(preg_replace("/[^A-Za-z0-9]/", '', $postcode));
 
    if(strlen($postcode) == 5) {
        $postcode = substr($postcode,0,2).' '.substr($postcode,2,3);
    }
    elseif(strlen($postcode) == 6) {
        $postcode = substr($postcode,0,3).' '.substr($postcode,3,3);
    }
    elseif(strlen($postcode) == 7) {
        $postcode = substr($postcode,0,4).' '.substr($postcode,4,3);
    }else{
        return false;
    }
 
    return $postcode;
}
?>