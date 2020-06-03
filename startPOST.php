<?php
session_start();
if ((!isset($_POST['szukaj']))) {
    header('Location: index.php');
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wypozyczalnia";

$odb = $_POST['odb'];
$zwr = $_POST['zwr'];
$dataodb = $_POST['dataodb'];
$datazwr = $_POST['datazwr'];

if((strtotime($datazwr) - strtotime($dataodb)) / (60 * 60 * 24) < 0){
    header('Location: index.php');
}else {

    $_SESSION['odb'] = $odb;
    $_SESSION['zwr'] = $zwr;
    $_SESSION['dataodb'] = $dataodb;
    $_SESSION['datazwr'] = $datazwr;

    $miastoodb = substr($odb, 0, strpos($odb, ','));
    $miastozwr = substr($zwr, 0, strpos($zwr, ','));

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->query("SET NAMES 'utf8'");
    $sql = "SELECT id_miejsce FROM miejsce WHERE miasto = '" . $miastoodb . "' ";
    $result1 = $conn->query($sql);
    $sql = "SELECT id_miejsce FROM miejsce WHERE miasto = '" . $miastozwr . "' ";
    $result2 = $conn->query($sql);
    $sql = "SELECT * FROM samochody WHERE id_samochod NOT IN (SELECT id_samochod FROM rezerwacje WHERE (data_odb <= '" . $dataodb . "' AND data_zwr >= '" . $dataodb . "') OR (data_odb <= '" . $datazwr . "' AND data_zwr >= '" . $datazwr . "'))";
    $result3 = $conn->query($sql);

    if ($result1->num_rows > 0 && $result2->num_rows > 0) {

        $result1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        foreach ($result1 as $row) {
            $_SESSION['idodb'] = $row['id_miejsce'];
        }
        $result2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        foreach ($result2 as $row) {
            $_SESSION['idzwr'] = $row['id_miejsce'];
        }
        $result3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
        $_SESSION['wybor'] = $result3;

        header('Location: wybor.php');
        $conn->close();

    } else {
        echo "Coś poszło nie tak";
    }
    $conn->close();
}
?>