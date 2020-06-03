<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}
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
    <a href="logout.php" class="btn btn-dark float-right" role="button">Wyloguj</a>
    <h1 class="text-center">Rezerwacje</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wypozyczalnia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$sql = "SELECT r.id_rezerwacja, k.id_klient, k.imie, k.nazwisko, k.email, k.nr_tel, 
s.marka, s.model, s.nr_rej, s.cena, s.kaucja, 
r.data_odb, r.data_zwr, r.id_miejsce_odb, r.id_miejsce_zwr 
FROM samochody s, rezerwacje r, klienci k 
WHERE k.id_klient = r.id_klient AND 
s.id_samochod = r.id_samochod";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>ID rezerwacji</th>
            <th>ID klienta</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Numer telefonu</th>
            <th>Nr rej</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Data odb</th>
            <th>Miejsce odb</th>
            <th>Data zwr</th>
            <th>Miejsce zwr</th>
            <th>Cena</th>
            <th>Kaucja</th>
        </tr>

        <?php
        foreach ($result as $a) {
            $sql = "SELECT miasto, ulica, numer FROM miejsce WHERE id_miejsce = '" . $a['id_miejsce_odb'] . "'";
            $result1 = $conn->query($sql);
            $result1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
            foreach ($result1 as $b) {
                $a['id_miejsce_odb'] = $b['miasto'] . ', ul. ' . $b['ulica'] . ' ' . $b['numer'];
            }
            $sql = "SELECT miasto, ulica, numer FROM miejsce WHERE id_miejsce = '" . $a['id_miejsce_zwr'] . "'";
            $result2 = $conn->query($sql);
            $result2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            foreach ($result2 as $c) {
                $a['id_miejsce_zwr'] = $c['miasto'] . ', ul. ' . $c['ulica'] . ' ' . $c['numer'];
            }
            ?>
            <tr>
                <td><?php echo $a['id_rezerwacja']; ?></td>
                <td><?php echo $a['id_klient']; ?></td>
                <td><?php echo $a['imie']; ?></td>
                <td><?php echo $a['nazwisko']; ?></td>
                <td><?php echo $a['email']; ?></td>
                <td><?php echo $a['nr_tel']; ?></td>
                <td><?php echo $a['nr_rej']; ?></td>
                <td><?php echo $a['marka']; ?></td>
                <td><?php echo $a['model']; ?></td>
                <td><?php echo $a['data_odb']; ?></td>
                <td><?php echo $a['id_miejsce_odb']; ?></td>
                <td><?php echo $a['data_zwr']; ?></td>
                <td><?php echo $a['id_miejsce_zwr']; ?></td>
                <td><?php echo $a['cena']; ?></td>
                <td><?php echo $a['kaucja']; ?></td>
                <form method="post" action="usun.php">
                    <input name="id_rez" type="hidden" value="<?php echo $a['id_rezerwacja']; ?>">
                    <td>
                        <button name="usun" class="btn btn-danger btn-xs">Usuń</button>
                    </td>
                </form>
            </tr>
            <?php
        }
        ?>
    </table>

    </body>
    </html>

    <?php

} else {
    echo "Coś poszło nie tak";
}
$conn->close();

?>