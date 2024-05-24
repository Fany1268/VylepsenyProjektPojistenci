<!DOCTYPE html>
<html lang="cs-cz">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registrace pojištěnce</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>

</head>

<body>

<header>
    <div id="logo">
        <h1>Aplikace pro vložení pojištěnců do databáze</h1>
        <small>Zhotovil František Krátký webdeveloper</small>
    </div>

    <nav>
        <ul>
            <li><a href="domu.html">Domů</a></li>
            <li class="aktivni"><a href="index.php">Vložení pojištěnce</a></li>
            <li><a href="tabulka.php">Výpis pojištěnců</a></li>
            



    </nav>



</header>


<article>

    <?php

    /**
     * Našte automaticky načte databázový wrapper ze souboru Db.php
     * míslo require_once('Db.php');
     */
    spl_autoload_register("nactiTridu");
    function nactiTridu(string $trida): void
    {
        require("tridy/$trida.php");
    }

    //require_once('tridy/Db.php');  funkci lze použít místo autoloaderu

    /**
     * Všechny funkce wrapperu nyní přístupné pod třídou Db.php a
     * voláme je jako Db::nazevFunkce().
     */
    Db::connect('127.0.0.1', 'klienti_pojistovny', 'root', '');


    if ($_POST) {

        Db::query('                                                             
            INSERT INTO pojistenci (jmeno, prijmeni, vek, telefon)
            VALUES (?, ?, ?, ?)
            ', $_POST['jmeno'], $_POST['prijmeni'], $_POST['vek'], $_POST['telefon']);


        echo('<table class="vlastnosti" boarder="6"><tr><td><p class="pozadi">Nový pojištěnec byl úspěšně zaregistrován.</p>');
        echo('</td></tr></table>');

    }

    ?>

    </br>

    <h2>Vlož nového pojištěnce</h2>

    <form method="post">
        <label>
            Jméno:<br />
            <input class="formular" type="text" name="jmeno" />
        </label><br />
        <label>
            Příjmení:<br />
            <input class="formular" type="text" name="prijmeni" />
        </label><br />
        <label>
            Věk:<br />
            <input class="formular" type="text" name="vek" />
        </label><br />
        <label>
            Telefon:<br />
            <input class="formular" type="text" name="telefon" />
        </label><br />
        <input class="tlacitko-ulozit" type="submit" value="Uložit" />
    </form>
</article>

<footer class="a">


    <div style="border-radius: 5px; justify-content:end; margin: 10px auto;;width: 25%;border-color: #3A363BFF; background-color: #1ee224;">
        <nav aria-label="Stránkování">
            <ul class="pagination pagination-sm, justify-content-center">
                <li class="page-item disabled">
                    <span aria-hidden="true" class="page-link">&laquo;</span>
                </li>
                <li class="page-item active"><a class="page-link" href="domu.html">1</a></li>
                <li class="page-item"><a class="page-link" href="index.php">2</a></li>
                <li class="page-item"><a class="page-link" href="tabulka.php">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="tabulka.php" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


    <p>Projekt evidence pojištění ve zjednodušená verzi vytvořil František Krátký pro <a href="http://www.ITnetwork.cz" target="_blank">ITnetwork.cz</a>.</p>



</body>

</html>














