#!/usr/bin/php -q
<?php

// This code demonstrates how to lookup the country by IP Address

include("geoip.inc");

$gi = geoip_open("GeoIP.dat",GEOIP_STANDARD);

echo geoip_country_code_by_addr($gi, "24.24.24.24") . "\t" .
     geoip_country_name_by_addr($gi, "24.24.24.24") . "\n";
echo geoip_country_code_by_addr($gi, "80.24.24.24") . "\t" .
     geoip_country_name_by_addr($gi, "80.24.24.24") . "\n";
echo geoip_country_code_by_addr($gi, "62.48.205.171") . "\t" .
     geoip_country_name_by_addr($gi, "62.48.205.171") . "\n";

geoip_close($gi);

?>
