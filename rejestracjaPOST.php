<?php

if (isset($_POST['rej'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wypozyczalnia";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_errno != 0) {
        echo "Error: " . $conn->connect_errno;
    } else {

        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $nrtel = $_POST['numertel'];
        $email = $_POST['email'];
        $haslo1 = $_POST['password'];
        $haslo2 = $_POST['password2'];
        $numerkarty = $_POST['numerkarty'];
        $dataw = $_POST['dataw'];
        $kodcvv = $_POST['kodcvv'];

        if ($rezultat = @$conn->query(
            sprintf("SELECT email FROM klienci WHERE email='%s'",
                mysqli_real_escape_string($conn, $email)))) {
            $conn->query("SET NAMES 'utf8'");
            $ilu_userow = $rezultat->num_rows;
            if ($ilu_userow == 0) {
                if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
                {
                    $sql = "INSERT INTO klienci (imie, nazwisko, nr_tel, email, haslo, nr_karty, data_waz, cvv) 
VALUES ('" . $imie . "', '" . $nazwisko . "', '" . $nrtel . "', '" . $email . "', '" . $haslo1 . "', '" . $numerkarty . "', '" . $dataw . "', '" . $kodcvv . "')";
                    if ($conn->query($sql) === TRUE) {
                        unset($_SESSION['bladtworzenia']);
                        unset($_SESSION['bladhasla']);
                        unset($_SESSION['bladmaila']);
                        unset($_SESSION['blad']);
                        header('Location: zarejestrowano.php');
                    } else {
                        $_SESSION['bladtworzenia'] = '<span style="color:red">Nie udało się utworzyć konta :(</span>';
                        header('Location: rejestracja.php');
                    }
                } else {
                    $_SESSION['bladhasla'] = '<span style="color:red">Hasła nie są takie same!</span>';
                    header('Location: rejestracja.php');
                }
            } else {
                $_SESSION['bladmaila'] = '<span style="color:red">Podany email jest już zajęty.</span>';
                header('Location: rejestracja.php');
            }
        }
        $conn->close();
    }
}
?>