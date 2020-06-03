<?php
session_start();
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
                    <a class="nav-link" href="#start"> Start </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#samochody"> Nasze samochody </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#oferta"> Oferta </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#o_nas"> O nas </a>
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
        <?php if (isset($_SESSION["zalogowany"])) {
            echo '<a href="logout.php" class="btn btn-dark float-right" role="button">Wyloguj</a>';
        } else {
            echo '<a href="rejestracja.php" class="btn btn-dark float-right" role="button">Rejestracja</a>
        <a href="logowanie.php" class="btn btn-dark float-right" role="button">Logowanie</a> ';
        }
        ?>
    </div>
</section>

<header class="masthead text-white text-center" id="start">
    <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto rounded-circle" src="img/car1.jpg" alt="">
        <h1 class="text-uppercase">Car Rent</h1>
        <img class="img-fluid mb-5 d-block mx-auto" src="img/gwiazda_white.png" alt="">
        <h3>- Atrakcyjne ceny wynajmu samochodów -</h3>
        <br>
    </div>
    <div class="container">
        <form action="startPOST.php" method="post">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="exampleSelect1">Miejsce odbioru</label>
                    <select class="form-control" name="odb">
                        <?php
                        foreach ($_SESSION['salony'] as $row) {
                            ?>
                            <option><?php echo $row['miasto'], ', ul. ', $row['ulica'], ' ', $row['numer']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="exampleSelect2">Miejsce zwrotu</label>
                    <select class="form-control" name="zwr">
                        <?php
                        foreach ($_SESSION['salony'] as $row) {
                            ?>
                            <option><?php echo $row['miasto'], ', ul. ', $row['ulica'], ' ', $row['numer']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="example-date-input1" class="col-form-label">Data odbioru</label>
                    <input class="form-control" type="date" value="<?php echo date("Y-m-d") ?>"
                           name="dataodb">
                </div>

                <div class="col-md-6 form-group">
                    <label for="example-date-input2" class="col-form-label">Data zwrotu</label>
                    <input class="form-control" type="date" value="<?php echo date("Y-m-d") ?>"
                           name="datazwr">
                </div>
            </div>
            <button id="szukaj" name="szukaj" class="btn btn-light btn-lg">Wyszukaj</button>
        </form>
    </div>
</header>


<main>

    <section id="samochody">

        <div class="container">

            <h2 class="text-uppercase">Nasze samochody</h2>
            <img class="img-fluid mb-5 d-block mx-auto gwiazda" src="img/gwiazda_black.png" alt="">

            <div class="row">
                <?php
                foreach ($_SESSION['galeria'] as $row) {
                    ?>
                    <div class="col-md-6 col-lg-4">

                        <figure>

                            <a href="img/samochody/sam_full/<?php echo $row['zdjecie']; ?>.jpg"
                               data-lightbox="galeria"
                               data-title="<?php echo $row['marka'], ' ', $row['model']; ?>"><img
                                        src="img/samochody/sam_mini/<?php echo $row['zdjecie']; ?>.jpg"
                                        data-lightbox="galeria"
                                        data-title="<?php echo $row['marka'], ' ', $row['model']; ?>"
                                        alt="<?php echo $row['marka'], ' ', $row['model']; ?>"></a>
                            <figcaption><?php echo $row['marka'], ' ', $row['model']; ?></figcaption>

                        </figure>

                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

    </section>


    <section id="oferta">
        <div class="container">
            <h2 class="text-uppercase">Oferta</h2>
            <img class="img-fluid mb-5 d-block mx-auto gwiazda" src="img/gwiazda_white.png" alt="">

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a eleifend augue. Pellentesque aliquam
                mauris diam. Mauris a diam ut ipsum laoreet iaculis. Vestibulum luctus in felis ut rutrum. Nunc nisl
                elit, vulputate cursus ornare non, commodo ac ligula.</p>

            <ul>

                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a eleifend augue. Pellentesque aliquam
                    mauris diam. Mauris a diam ut ipsum laoreet iaculis. Vestibulum luctus in felis ut rutrum. Nunc nisl
                    elit, vulputate cursus ornare non, commodo ac ligula.
                </li>
                <li>Vestibulum luctus in felis ut rutrum. Nunc nisl elit, vulputate cursus ornare non, commodo ac
                    ligula. Sed pellentesque aliquet nunc quis ultricies. Donec sollicitudin dignissim facilisis.
                </li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a eleifend augue. Pellentesque aliquam
                    mauris diam. Mauris a diam ut ipsum laoreet iaculis. Vestibulum luctus in felis ut rutrum.
                </li>
                <li>Ut suscipit in diam ac dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    mollis leo nunc, in laoreet est efficitur vitae.
                </li>

            </ul>

            <p>Vestibulum luctus in felis ut rutrum. Nunc nisl elit, vulputate cursus ornare non, commodo ac ligula. Sed
                pellentesque aliquet nunc quis ultricies.</p>

        </div>
    </section>

    <section id="o_nas">
        <div class="container">
            <h2 class="text-uppercase">O nas</h2>
            <img class="img-fluid mb-5 d-block mx-auto gwiazda" src="img/gwiazda_black.png" alt="">

            <div class="row">

                <p class="col-md-12 col-lg-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a eleifend
                    augue. Pellentesque aliquam mauris diam. Mauris a diam ut ipsum laoreet iaculis. Vestibulum luctus
                    in felis ut rutrum. Nunc nisl elit, vulputate cursus ornare non, commodo ac ligula. Sed pellentesque
                    aliquet nunc quis ultricies. Donec sollicitudin dignissim facilisis. Nam tristique vestibulum elit
                    vel vestibulum. Integer et finibus ex. Morbi nunc est, fermentum at est vel, varius volutpat eros.
                    Aenean nec malesuada neque.</p>
                <p class="col-md-12 col-lg-6">Ut suscipit in diam ac dignissim. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Sed mollis leo nunc, in laoreet est efficitur vitae. Praesent quis pretium mauris.
                    Aenean sodales neque at elit maximus, viverra luctus magna aliquet. Integer vestibulum viverra
                    mauris, ac lobortis mauris. Suspendisse placerat tincidunt lectus, id imperdiet dolor bibendum
                    fermentum. Donec sed pulvinar magna. Nunc quis elit dapibus, aliquet nunc non, blandit elit. Donec
                    porttitor velit in erat vestibulum egestas.</p>
            </div>
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
