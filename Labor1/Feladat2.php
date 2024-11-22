<?php
$seconds = 3670;
if (is_int($seconds)) {
    $hours = $seconds/ 3600;
    echo "A megadott másodpercek száma : " . $hours . " óra.";
} else {
    echo "Hiba";
}