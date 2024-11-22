<?php
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $nyelv => $napokLista) {
    echo $nyelv . ": ";
    foreach ($napokLista as $nap) {
        if (in_array($nap, ["K", "Cs", "Szo", "Tu", "Th", "Sa", "Di", "Do", "Sa"])) {
            echo "<strong>$nap</strong>, ";
        } else {
            echo "$nap, ";
        }
    }
    echo "<br>";
}
?>
<?php
