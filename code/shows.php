<?php
    // Array completo degli spettacoli, con titoli, descrizioni e immagini
    $all_shows = [
        [
            'title' => 'Cats',
            'description' => "Cats è un celebre musical scritto da Andrew Lloyd Webber, ispirato alla raccolta 
                            di poesie Old Possum's Book of Practical Cats di T.S. Eliot.
                            Lo spettacolo racconta la storia di un gruppo di gatti che si riuniscono ogni anno 
                            per l' Heaviside Layer, un momento in cui uno di loro verrà scelto per essere 
                            reincarnato in una nuova vita. Il musical è noto per la sua scenografia suggestiva, 
                            le canzoni indimenticabili (come Memory) e le spettacolari performance di danza. 
                            Ogni personaggio è un gatto unico con una personalità e una storia propria, rendendo 
                            Cats un'esperienza visivamente e musicalmente affascinante.",
            'poster' => 'img/cats.png' // Percorso immagine
        ],
        [
            'title' => 'Hamilton',
            'description' => "Hamilton è un rivoluzionario musical scritto da Lin-Manuel Miranda che racconta 
                            la vita di Alexander Hamilton, uno dei padri fondatori degli Stati Uniti. 
                            Attraverso un mix innovativo di rap, hip-hop e musica tradizionale da musical, 
                            Hamilton esplora temi di ambizione, politica, amore e lotta per l'indipendenza. 
                            Lo spettacolo ha ricevuto ampi consensi per la sua originalità, 
                            la sua potente narrazione e la rappresentazione diversificata dei personaggi storici.
                            È un'opera che sfida le convenzioni del teatro musicale moderno, rendendo la storia 
                            della politica americana accessibile e coinvolgente per un pubblico contemporaneo.",
            'poster' => 'img/hamilton.png'
        ],
        [
            'title' => "Fantasma dell'Opera",
            'description' => "Il Fantasma dell'Opera (musical di Andrew Lloyd Webber) è un dramma romantico 
                            e misterioso che ruota attorno alla storia di Christine Daaé, una giovane soprano che diventa 
                            l'oggetto del desiderio di un enigmatico e deforme uomo conosciuto come il Fantasma, che vive 
                            nascosto nel teatro dell'Opera di Parigi. Mentre Christine si trova a fare i conti con 
                            l'amore di Raoul e la crescente ossessione del Fantasma per lei, lo spettacolo esplora temi 
                            di passione, gelosia e desiderio. La musica iconica, con brani come The Phantom of the Opera e 
                            Music of the Night, insieme alla scenografia mozzafiato, ha reso questo musical uno dei più amati 
                            e longevi di sempre.",
            'poster' => 'img/fantasmaOpera.png'
        ],
        [
            'title' => 'Miserables',
            'description' => "Les Misérables è un adattamento musicale del romanzo di Victor Hugo, che racconta 
                            le vicende di Jean Valjean, un ex galeotto che cerca di rifarsi una vita mentre viene perseguitato 
                            dall'inesorabile ispettrice Javert. Ambientato durante la Rivoluzione Francese, il musical esplora 
                            temi di giustizia, redenzione, amore e sacrificio. Con un cast di personaggi memorabili come Fantine,
                            Cosette, Éponine e Marius, Les Misérables è noto per le sue canzoni potenti, tra cui I Dreamed a Dream,
                            On My Own e Do You Hear the People Sing?, che raccontano la lotta per la libertà e la speranza in un 
                            mondo difficile.",
            'poster' => 'img/miserables.png'
        ],
        [
            'title' => 'Oz',
            'description' => "Il Mago di Oz è un adattamento musicale del famoso romanzo di L. Frank Baum. 
                            La storia segue Dorothy, una giovane ragazza che viene trasportata in un mondo magico dopo essere 
                            stata colpita da un tornado. Insieme ai suoi nuovi amici – lo Spaventapasseri, il Boscaiolo di Latta
                            e il Leone Codardo – Dorothy intraprende un viaggio per incontrare il Mago di Oz e trovare il modo 
                            di tornare a casa. Con canzoni indimenticabili come Over the Rainbow, lo spettacolo esplora temi 
                            di coraggio, amicizia e l'importanza di apprezzare ciò che si ha. La storia affascina tanto i 
                            bambini quanto gli adulti, rimanendo un classico intramontabile del teatro musicale.",
            'poster' => 'img/oz.png'
        ]
    ];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>theater</title>

    <link href="style.css" type="text/css" rel="stylesheet">
    
    <!-- 
        Font
        https://fonts.google.com/
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    
</head>
<body>
    <!-- Navbar -->
    <nav id="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="shows.php"><img src="img/shows.png" alt="shows" class="icons">Shows</a></li>
            <li><a href="basket.php"><img src="img/shoppingCart.png" alt="shoppingCart" class="icons">Basket</a></li>
        </ul>
    </nav> 
    <!-- Content -->
    <div id="container-img">
        <img src="img/schiaccianoci.png" alt="schiaccianoci" class="background-image">
        <div class="overlay"></div>
        <div class="logo">
            <h1>Shows</h1>
        </div>
    </div>
    <div id="content">
        <section>
            <div class="content-text">
                <h1>Benvenuti</h1>
                <?php
                    // Se il form è stato inviato, non mostrare il messaggio introduttivo
                    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
                        echo '<h3>Prima di mostrarvi i nostri bellisimi shows della serata, per favore schegliete il teatro che vi piacerebbe vederlo</h3>';
                    }
                ?>
                <!-- Form per selezionare la città e il teatro -->
                <form id="show-form" method="GET" style="display: flex; gap: 1vh;">
                    <!-- Selezione della città -->
                    <select id="citta" name="citta" onchange="mostraTeatri()" style="height: 4vh; width: 24vh;">
                        <option value="" disabled selected>Select a city</option>
                        <option value="ferrara">Ferrara</option>
                        <option value="bologna">Bologna</option>
                    </select>

                    <select id="teatro" name="teatro" style="height: 4vh; width: 24vh;">
                        <!-- Le opzioni verranno popolate dinamicamente -->
                        <option value="" disabled selected>Select a theater</option>
                    </select>

                    <button type="submit" style="width: 4vh; height: 4vh; display: flex; justify-content: center; align-items: center; padding: 0; border: none; background-color: transparent;">
                        <img src="img/searchBlack.png" alt="Submit" class="icons" style="width: 2vh; height: 2vh;">
                    </button>
                </form>


                <!-- Modificare i file da html in php -->
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['citta'], $_GET['teatro'])) {
                        // Recupera città e teatro dalla richiesta GET
                        $citta = $_GET['citta'];
                        $teatro = $_GET['teatro'];

                        // Filtro gli spettacoli in base alla città
                        $filtered_shows = [];
                        if ($citta == "ferrara") {
                            $filtered_shows = array_filter($all_shows, function($show) {
                                return in_array($show['title'], ['Cats', 'Hamilton', 'Miserables']);
                            });
                        } elseif ($citta == "bologna") {
                            $filtered_shows = array_filter($all_shows, function($show) {
                                return in_array($show['title'], ['Cats','Fantasma dell\'Opera', 'Oz']);
                            });
                        }

                        // Se ci sono spettacoli da mostrare
                        if (!empty($filtered_shows)) {
                            echo "<div id='shows'>
                                     <h2>Shows disponibili:</h2>
                                     <ul id='shows-list'>";
                            foreach ($filtered_shows as $show) {
                                $image_path = $show['poster'];
                                $image_size = getimagesize($image_path);
                                $width = $image_size[0];
                                $height = $image_size[1];

                                // Ridimensiona l'immagine
                                $new_width = 300; // larghezza desiderata
                                $new_height = ($height / $width) * $new_width;

                                // Stile inline per arrotondare le immagini e disporre testo a destra
                                echo "<li class='show-item' style='list-style-type: none; margin-bottom: 20px;'>
                                          <div class='show-card' style='display: flex; align-items: flex-start;'>
                                              <img src='" . htmlspecialchars($show['poster']) . "' alt='" . htmlspecialchars($show['title']) . "' 
                                                   width='" . $new_width . "' height='" . $new_height . "' 
                                                   style='border-radius: 15px; margin-right: 20px; box-shadow: none;'>
                                              <div>
                                                  <h2>" . htmlspecialchars($show['title']) . "</h2>
                                                  <p>" . htmlspecialchars($show['description']) . "</p>
                                              </div>
                                          </div>
                                      </li>";
                            }
                            echo "</ul></div>";
                        } else {
                            echo "<p>No shows available for this selection.</p>";
                        }
                    }
                ?>
            </div>
        </section>
        <!-- Javascript -->
        <script src="select.js"></script>
    </div>
    <div id="footer">
        <p>
            © 2024 Theater. All rights reserved. <br>
            <a href="about.html">About Us</a>
        </p>
    </div>
    
    <!-- Javascript -->
    <script src="script.js"></script>
</body>
</html>