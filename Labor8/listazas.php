<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    die("Access denied. Please <a href='login.php'>login</a>.");
}

include 'db_config.php';
$conn = get_db_connection();

$stmt = $conn->prepare("SELECT * FROM hallgatok");
$stmt->execute();
$result = $stmt->get_result();

echo "<a href='bevitel.php'>Új hallgató</a>";
if ($result->num_rows > 0) {
    echo "<table border=1>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nev"] . "</td>";
        echo "<td>" . $row["szak"] . "</td>";
        echo "<td>" . $row["atlag"] . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Update</a></td>";
        echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$stmt->close();
$conn->close();
?>
