<?php
session_start();
if (!isset($_SESSION["zalogowany"]) || !isset($_SESSION["sukces"])) {
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
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark fixed-top navbar-expand-lg" id="mainNav">

    <div class="container">

        <a class="navbar-brand" href="index.php">CAR-RENT.PL</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu"
                aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainmenu">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php"> Start </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#samochody"> Nasze samochody </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#oferta"> Oferta </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php#o_nas"> O nas </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kontakt_wynik"> Kontakt </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<section id="login">
    <div class="container">
        <?php if (isset($_SESSION["zalogowany"])) {
            echo '<a href="logout.php" class="btn btn-dark float-right" role="button">Wyloguj</a>';
        } else {
            echo '<a href="rejestracja.php" class="btn btn-dark float-right" role="button">Rejestracja</a>
        <a href="logowanie.php" class="btn btn-dark float-right" role="button">Logowanie</a> ';
        }
        ?>
    </div>
</section>

<header class="masthead text-white text-center" id="startwynik">
    <div class="container">
        <h1 class="text-uppercase">Rezerwacja przebiegła pomyślnie</h1>
        <img class="img-fluid mb-5 d-block mx-auto" src="img/gwiazda_white.png" alt="">
    </div>
</header>


<main>

    <section id="potwierdzenie">
        <div class="container text-center">
            <h3>Zarezerwowałeś samochód</h3>
            <h3 class="font-weight-bold"><?php
                foreach ($_SESSION['sam'] as $p) {
                    echo $p['marka'] . ' ' . $p['model'];
                }
                ?></h3>
            <h3> - Odbiór: <?php echo $_SESSION['dataodb'] . ' - ' . $_SESSION['odb'] ?> -</h3>
            <h3>- Zwrot: <?php echo $_SESSION['datazwr'] . ' - ' . $_SESSION['zwr'] ?> -</h3>
            <h3 class="font-weight-bold">Potwierdzenie rezerwacji zostało wysłane na Twoją skrzynkę mailową</h3>
        </div>
    </section>


    <section id="kontakt_wynik">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase">Kontakt</h4>
                    <p>Car Rent sp. z o. o.</p>
                    <p>tel. 000 000 000</p>
                    <p>ul. Ulicowa 5</p>
                    <p>00-000 Miastowo</p>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase">W sieci</h4>
                    <a href="#"><img class="img-fluid" src="img/ikony/facebook.png" alt=""></a>
                    <a href="#"><img class="img-fluid" src="img/ikony/googleplus.png" alt=""></a>
                    <a href="#"><img class="img-fluid" src="img/ikony/twitter.png" alt=""></a>
                    <a href="#"><img class="img-fluid" src="img/ikony/instagram.png" alt=""></a>
                    <a href="#"><img class="img-fluid" src="img/ikony/youtube.png" alt=""></a>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase">Lorem ipsum</h4>
                    <p>Ut suscipit in diam ac dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<footer>
    <p>Copyright &copy Andrzej Bieda 2019</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/js_galeria/lightbox-plus-jquery.min.js"></script>
<script>
    lightbox.option({
        'alwaysShowNavOnTouchDevices': true
    })
</script>

</body>
</html>
<?php
$mail = $_SESSION['mail'];
session_unset();
$_SESSION['mail'] = $mail;
$_SESSION['zalogowany'] = true;
?>