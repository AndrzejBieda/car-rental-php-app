<?php
session_start();
if ((!isset($_POST['rezerwuj']))) {
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

$sql = "SELECT id_klient FROM klienci WHERE email = '" . $_SESSION['mail'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($result as $row) {
        $id_klient = $row['id_klient'];
    }

    $sql = "INSERT INTO rezerwacje (id_klient, id_samochod, id_miejsce_odb, id_miejsce_zwr, data_odb, data_zwr) 
VALUES ('" . $id_klient . "', '" . $id_sam . "', '" . $_SESSION['idodb'] . "', '" . $_SESSION['idzwr'] . "', '" . $_SESSION['dataodb'] . "', '" . $_SESSION['datazwr'] . "')";
    if ($conn->query($sql) === TRUE) {

        $_SESSION['sukces'] = true;
        header('Location: sukces.php');
        $conn->close();

    } else {
        echo "Coś poszło nie tak";
    }
} else {
    echo "Coś poszło nie tak";
}
$conn->close();

?>