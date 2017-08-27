<?php
/**
 * Created by IntelliJ IDEA.
 * User: blenz
 * Date: 5/3/17
 * Time: 4:18 PM
 */

$csvFile = file('../tax_rates.csv');

$zip = $_REQUEST["zip"];
$shipping = strtolower($_REQUEST["shipping"]);
$shipping_cost;

if ($shipping == "overnight")
    $shipping_cost = 10;
else if ($shipping == "2-day")
    $shipping_cost = 7;
else if ($shipping == "6-day")
    $shipping_cost = 3;

$result = [$shipping_cost];


// lookup all hints from array if $q is different from ""
if ($zip !== "") {

    foreach($csvFile as $line) {
        $line = str_getcsv($line);

        if ($zip == $line[1]) {
            $result[] = $line[2];
            print_r(json_encode($result));
            die();
        }

    }
}
print_r(json_encode($result));
?>