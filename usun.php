<?php
session_start();
if ((!isset($_POST['usun']))) {
    header('Location: index.php');
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wypozyczalnia";

$id_rez = $_POST['id_rez'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");


$sql = "DELETE FROM rezerwacje WHERE id_rezerwacja = '" . $id_rez . "'";
if ($conn->query($sql) === TRUE) {
    ?>

    <!DOCTYPE html>
    <html lang="pl" xmlns="http://www.w3.org/1999/html">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Car Rent</title>
        <meta name="description" content="Wypożyczalnia samochodów Car Rent">
        <meta name="keywords" content="wypożyczalnia samochodów, samochody, auta">
        <meta name="author" content="Car-Rent">
        <meta http-equiv="X-Ua-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="img/car_min.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link href="css/lightbox.css" rel="stylesheet">

    </head>
    <body>

    <div class="d-flex justify-content-center">
        <h1 class="text-center">Pomyślnie usunięto rezerwację o ID: <?php echo $id_rez; ?></h1>
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-success" href="rezerwacje.php" role="button">Powrót do listy rezerwacji</a>
    </div>

    </body>
    </html>

    <?php
} else {
    echo "Coś poszło nie tak";
}
$conn->close();

?>