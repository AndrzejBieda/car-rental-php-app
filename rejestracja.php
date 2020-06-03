<?php
session_start();
if (isset($_SESSION["zalogowany"])) {
    header('Location: index.php');
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
                    <a class="nav-link" href="#kontakt"> Kontakt </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<section id="login">
    <div class="container">
        <a href="rejestracja.php" class="btn btn-dark float-right" role="button">Rejestracja</a>
        <a href="logowanie.php" class="btn btn-dark float-right" role="button">Logowanie</a>
    </div>
</section>

<header class="masthead text-white text-center" id="startrej">
    <div class="container">
        <h1 class="text-uppercase">Rejestracja</h1>
        <img class="img-fluid mb-5 d-block mx-auto" src="img/gwiazda_white.png" alt="">
    </div>
</header>


<main>

    <section id="rejestracja">
        <div class="container">
                    <form class="form-horizontal" method="post" action="rejestracjaPOST.php">
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="imie">Imię</label>
                                <div class="col-md-4">
                                    <input id="imie" name="imie" type="text" class="form-control input-md" pattern="[A-Za-z]{2,}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nazwisko">Nazwisko</label>
                                <div class="col-md-4">
                                    <input id="nazwisko" name="nazwisko" type="text" class="form-control input-md" pattern="[A-Za-z]{2,}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="numertel">Numer telefonu</label>
                                <div class="col-md-4">
                                    <input id="numertel" name="numertel" type="text" class="form-control input-md" pattern="^[1-9]{1}[0-9]{8}$" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">E-mail</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" type="email" placeholder="np. jan.kowalski@gmail.com" class="form-control input-md" required>
                                </div>
                            </div>

                            <?php
                            if (isset($_SESSION['bladmaila'])) echo $_SESSION['bladmaila'];
                            unset($_SESSION['bladmaila']);
                            ?>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Hasło</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="min. 6 znaków" class="form-control input-md" pattern=".{6,}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password2">Powtórz hasło</label>
                                <div class="col-md-4">
                                    <input id="password2" name="password2" type="password" class="form-control input-md" pattern=".{6,}" required>
                                </div>
                            </div>

                            <?php
                            if (isset($_SESSION['bladhasla'])) echo $_SESSION['bladhasla'];
                            unset($_SESSION['bladhasla']);
                            ?>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="numerkarty">Numer karty
                                    kredytowej/debetowej</label>
                                <div class="col-md-4">
                                    <input id="numerkarty" name="numerkarty" type="text" placeholder="16 cyfr" class="form-control input-md" pattern="^[0-9]{16}$" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="dataw">Data ważności</label>
                                <div class="col-md-4">
                                    <input id="dataw" name="dataw" type="text" placeholder="MM/RR" class="form-control input-md" pattern="^[0-9]{2}/[0-9]{2}$" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="kodcvv">Kod CVV</label>
                                <div class="col-md-4">
                                    <input id="kodcvv" name="kodcvv" type="text" placeholder="kod zawarty na odwrocie karty" class="form-control input-md" pattern="^[0-9]{3}$" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="checkboxes"></label>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label for="checkboxes-0">
                                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1" required>
                                            * Oświadczam, że znam i akceptuję postanowienia Regulaminu Car-Rent.pl
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkboxes-1">
                                            <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                                            Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych i otrzymywanie informacji handlowych od Car Rent sp. z o. o. z wykorzystaniem środków komunikacji elektronicznej (m.in. e-mail).
                                        </label>
                                    </div>
                                    <p class="text-danger">* Pole obowiązkowe</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="rej"></label>
                                <div class="col-md-4">
                                    <button id="rej" name="rej" class="btn btn-success">Rejestracja</button>
                                </div>
                            </div>

                            <?php
                            if (isset($_SESSION['bladtworzenia'])) echo $_SESSION['bladtworzenia'];
                            unset($_SESSION['bladtworzenia']);
                            ?>

                        </fieldset>
                    </form>
        </div>
    </section>


    <section id="kontakt">
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