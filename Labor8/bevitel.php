<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    die("Access denied. Please <a href='login.php'>login</a>.");
}

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["nev"];
    $szak = $_POST["szak"];
    $atlag = $_POST["atlag"];

    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $szak, $atlag);

    if ($stmt->execute()) {
        echo "Data successfully inserted.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="POST">
    Név: <input type="text" name="nev" required><br>
    Szak: <input type="text" name="szak" required><br>
    Átlag: <input type="number" name="atlag" step="0.01" required><br>
    <button type="submit">Hozzáadás</button>
</form>
