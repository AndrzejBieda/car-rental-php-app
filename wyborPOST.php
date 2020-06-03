<?php
session_start();
if ((!isset($_POST['wybierz']))) {
    header('Location: index.php');
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wypozyczalnia";

$id_sam = $_POST['id_sam'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$sql = "SELECT * FROM samochody WHERE id_samochod = '" . $id_sam . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $_SESSION['sam'] = $result;

    header('Location: potwierdzenie.php');
    $conn->close();

} else {
    echo "Coś poszło nie tak";
}
$conn->close();

?>