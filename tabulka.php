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
            <li><a href="index.php">Vložení pojištěnce</a></li>
            <li class="aktivni"><a href="tabulka.php">Výpis pojištěnců</a></li>
            




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





    $pojistenci = Db::queryAll('SELECT * FROM pojistenci');



    echo('<h2>Seznam pojištěnců</h2><table class="vlastnosti" border="6"><tr><td>Jméno</td><td>Příjmení</td><td>Věk</td><td>Telefon</td></tr>');
    foreach ($pojistenci as $pojistenec) {
        echo('<tr><td>' . htmlspecialchars($pojistenec['jmeno']));
        echo('</td><td>' . htmlspecialchars($pojistenec['prijmeni']));
        echo('</td><td>' . htmlspecialchars($pojistenec['vek']));
        echo('</td><td>' . htmlspecialchars($pojistenec['telefon']));
        echo('</td></tr>');
    }

    echo('</table>');

    ?>
</article>

<footer>



    <div style="border-radius: 5px; justify-content:end; margin: 10px auto;;width: 25%;border-color: #3A363BFF; background-color: #1ee224;">
        <nav aria-label="Stránkování">
            <ul class="pagination pagination-sm, justify-content-center">
                <li class="page-item disabled">
                    <span aria-hidden="true" class="page-link">&laquo;</span>
                </li>
                <li class="page-item"><a class="page-link" href="domu.html">1</a></li>
                <li class="page-item"><a class="page-link" href="index.php">2</a></li>
                <li class="page-item active"><a class="page-link" href="tabulka.php">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="domu.html" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


    <p>Projekt evidence pojištění ve zjednodušená verzi vytvořil František Krátký pro <a href="http://www.ITnetwork.cz" target="_blank">ITnetwork.cz</a>.</p>





</footer>

</body>

</html>








