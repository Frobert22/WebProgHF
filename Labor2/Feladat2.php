<?php
$orszagok = array(
    "Magyarország" => "Budapest",
    "Románia" => "Bukarest",
    "Belgium" => "Brüsszel",
    "Ausztria" => "Bécs",
    "Lengyelország" => "Varsó"
);

foreach ($orszagok as $orszag => $fovaros) {
    echo "\"" . $orszag . " fővárosa <span style='color:red'>" . $fovaros . "</span>\"<br>";}
?>
