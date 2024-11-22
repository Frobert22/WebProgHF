<?php
$array = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

for ($i = 0; $i < count($array); $i++) {
    $type = gettype($array[$i]);
    if (is_numeric($array[$i])) {
        echo "$type: Igen\n";
    } else {
        echo "$type: Nem\n";
    }
}

