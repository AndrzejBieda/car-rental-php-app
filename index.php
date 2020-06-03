<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wypozyczalnia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$sql = "SELECT miasto, ulica, numer FROM miejsce";
$result1 = $conn->query($sql);
$sql = "SELECT marka, model, zdjecie FROM samochody";
$result2 = $conn->query($sql);

if ($result1->num_rows > 0 && $result2->num_rows > 0) {

    $result1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
    $_SESSION['salony']=$result1;
    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
    $_SESSION['galeria']=$result2;

    header('Location: start.php');
    $conn->close();

} else {
    echo "Coś poszło nie tak";
}
$conn->close();
?>