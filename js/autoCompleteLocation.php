<?php
// Array with names
$csvFile = file('../zip_codes_states.csv');

// get the q parameter from URL
$q = $_REQUEST["q"];
$type = $_REQUEST["type"];
$city = $_REQUEST["city"];
$num;

if ($type == "zip_list")
    $num = 0;
else if ($type == "state_list")
    $num = 2;
else if ($type == "city_list")
    $num = 1;

$useCity = $city != "" && $type != "city_list";



$result = [];

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    $i = 0;
    foreach($csvFile as $line) {
        $line_arr = str_getcsv($line)[$num];
        if ($useCity) {
            if (stristr($q, substr($line_arr, 0, $len)) && !in_array($line_arr, $result) && $city == str_getcsv($line)[1]) {
                $result[] = $line_arr;

                if ($i++ > 20)
                    break;
            }
        }
        else
        {
            if (stristr($q, substr($line_arr, 0, $len)) && !in_array($line_arr, $result)) {
                $result[] = $line_arr;

                if ($i++ > 20)
                    break;
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
print_r(json_encode($result));
?>
