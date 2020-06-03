<?php
session_start();
if ((!isset($_POST['email'])) || (!isset($_POST['password']))) {
    header('Location: index.php');
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wypozyczalnia";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_errno != 0) {
    echo "Error: " . $conn->connect_errno;
} else {
    $login = $_POST['email'];
    $haslo = $_POST['password'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    if ($rezultat = @$conn->query(
        sprintf("SELECT email, haslo FROM klienci WHERE email='%s' AND haslo='%s'",
            mysqli_real_escape_string($conn, $login),
            mysqli_real_escape_string($conn, $haslo)))) {
        $ilu_userow = $rezultat->num_rows;
        if ($ilu_userow > 0) {
            $_SESSION['zalogowany'] = true;
            $_SESSION['mail'] = $login;

            unset($_SESSION['blad']);
            $rezultat->free_result();
            header('Location: index.php');
        } elseif ($rezultat = @$conn->query(
            sprintf("SELECT email, haslo FROM pracownicy WHERE email='%s' AND haslo='%s'",
                mysqli_real_escape_string($conn, $login),
                mysqli_real_escape_string($conn, $haslo)))) {
            $ilu_userow = $rezultat->num_rows;
            if ($ilu_userow > 0) {
                $_SESSION['admin'] = true;
                $_SESSION['mail'] = $login;

                unset($_SESSION['blad']);
                $rezultat->free_result();
                header('Location: rezerwacje.php');

            } else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: logowanie.php');
            }
        }
    }
    $conn->close();
}
?>