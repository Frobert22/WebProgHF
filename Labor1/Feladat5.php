<?php
function evszak($honap) {
    if ($honap == 12 || $honap == 1 || $honap == 2) {
        return "Tél";
    } elseif ($honap >= 3 && $honap <= 5) {
        return "Tavasz";
    } elseif ($honap >= 6 && $honap <= 8) {
        return "Nyár";
    } elseif ($honap >= 9 && $honap <= 11) {
        return "Ősz";
    } else {
        return "Érvénytelen hónap!";
    }
}

$honap = 4;
echo evszak($honap);
?>