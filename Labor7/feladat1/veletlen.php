<?php
if (!isset($_COOKIE['veletlen_szam'])) {
    $veletlen_szam = rand(1, 10);
    setcookie('veletlen_szam', $veletlen_szam, time() + 3600, '/');
} else {
    $veletlen_szam = $_COOKIE['veletlen_szam'];
}

if (isset($_POST['submit'])) {
    $talalgatas = (int)$_POST['talalgatas'];

    if ($talalgatas == $veletlen_szam) {
        echo "Gratulálok, eltaláltad a számot!";
        $veletlen_szam = rand(1, 10);
        setcookie('veletlen_szam', $veletlen_szam, time() + 3600, '/');

    } else {
        echo "Nem találtad el. Próbáld újra!";
    }
}
?>

<form method="post" action="">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text" required>
    <br><br>
    <input type="submit" name="submit" value="Elküld">
</form>
