<?php
$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

foreach ($szinek as $szin => $ertek) {
    $szinek[$szin] = strtolower($ertek);
}
print_r($szinek);
echo "<br>";

foreach ($szinek as $szin => $ertek) {
    $szinek[$szin] = strtoupper($ertek);
}
print_r($szinek);
