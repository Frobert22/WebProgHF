<!DOCTYPE html>
<html>

<body>
<table width="400px" border="1px" cellspacing="0px">
    <?php

    $value = 0;

    for($col = 0; $col < 3; $col++) {
        echo "<tr>";
        $value = $col;

        for($row = 0; $row < 3; $row++) {
            if($value%2 == 0) {
                echo
                "<td height=40px width=20px bgcolor=black></td>";
                $value++;
            }
            else {
                echo
                "<td height=40px width=20px bgcolor=white></td>";
                $value++;
            }
        }
        echo "</tr>";
    }
    ?>
</table>
</body>

</html>
