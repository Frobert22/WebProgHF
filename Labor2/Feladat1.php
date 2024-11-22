<?php
$n = 10;
echo "<table border='1' cellspacing='0' cellpadding='5'>";

for ($i = 1; $i <= $n; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $n; $j++) {
        $value = $i * $j;
        if ($i == $j) {
            echo "<td style='background-color: #00aaff;'>$value</td>";
        } else {
            echo "<td>$value</td>";
        }
    }
    echo "</tr>";
}

echo "</table>";
?>
