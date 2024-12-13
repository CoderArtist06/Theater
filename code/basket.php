<!DOCTYPE html> 
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>theater</title>

    <style>
        /* ----------------------------------- Default --------------------------------- */
        * {
            font-family: "EB Garamond", serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        body {
            background: #000000;
            margin: 0; /* Rimuove il margine di default */
        }

        html {
            scroll-behavior: smooth;
        }

        a {
            text-decoration: none;
        }

        /* ------------------------------ Navigation bar -------------------------------- */
        #navbar {
            margin-top: 0.5vh;
            background-color: #181919;
            overflow: hidden;
            position: fixed;
            z-index: 1000;
            border-radius: 2vh;
            padding: 1vh;
            box-sizing: border-box;
            /* Center the navbar */
            top: 0;
            width: 60%;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Stili per gli elementi della lista (menu items) */
        #navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        #navbar li {
            display: inline;
            margin-right: 20px;
        }

        #navbar a {
            font-size: larger;
            color: white;
            padding: 14px 20px;
            display: inline-block;
            border-radius: 30px;  /* Angoli arrotondati per un effetto più morbido */
            transition: all 0.3s ease;  /* Transizione fluida per tutti gli effetti */
        }

        /* Effetto al passaggio del mouse */
        #navbar a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 30px;  /* Mantieni gli angoli arrotondati durante l'hover */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);  /* Aggiungi un'ombra per un effetto "sdontato" */
            transform: scale(1.05);  /* Ingigantisce leggermente il link per un effetto di "zoom" */
        }

        .icons {
            width: 2.5vh;
            height: 2.5vh;
            padding-right: 1vh;
            filter: invert(0%);
        }

        a:hover .icons {
            color: black;
            filter: invert(100%);
        }

        /* ------------------------------ Content ------------------------------ */
        #content {
            width: 100%;
            padding-top: 15vh;  /* Assicurati che il contenuto non si sovrapponga al navbar */
            padding-bottom: 60px; 
        }

        section {
            margin-top: 0;  /* Rimuovi completamente il margine superiore */
            margin-bottom: 5vh;  /* Riduci il margine inferiore per non avere troppo spazio in basso */
            margin-left: 5vh;
            margin-right: 5vh;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 2vh;
            padding: 5vh;
            display: flex; 
            align-items: center; 
        }

        .par {
            padding: 5px;
        }

        /* Stile per l'icona dell'informazione */
        .info-icon {
            width: 50px; /* Larghezza del cerchio */
            height: 50px; /* Altezza del cerchio */
            background-color: #00008B; /* Colore blu di sfondo */
            border-radius: 50%; /* Crea il cerchio */
            display: flex; /* Usa flexbox per allineare il contenuto */
            justify-content: center; /* Allinea orizzontalmente il testo al centro */
            align-items: center; /* Allinea verticalmente il testo al centro */
            color: white; /* Colore del testo (bianco) */
            font-size: 24px; /* Dimensione del testo */
            font-weight: bold; /* Testo in grassetto */
            margin-right: 20px; /* Distanza tra l'immagine e il testo */
        }

        section .content-text {
            flex: 1; /* Il testo occupa lo spazio rimanente */
        }

        /* ---------------------------- Footer ---------------------------------- */
        #footer {
            position: relative;
            padding: 1em;
            width: 100%;
            background-color: #000000;
            color: white;
            font-size: 15px;
            text-align: center;
            margin-top: 20px;
            box-sizing: border-box;
        }

        #footer a {
            color: white;
        }
        /* Form */
        
        /* Abbassare il pulsante Acquista */
        
       
        #price-display {
            margin-top: 25vh; /* Aggiungi spazio sotto il prezzo, sopra il pulsante */
        }

        #show-form {
            display: flex;
            flex-direction: column;
            gap: 1vh;
        }

        select, button {
            height: 4vh;
            font-size: 16px;
            padding: 0.5vh;
        }

        .seat-grid {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 5px;
            margin-top: 20px;
        }

        .seat {
            width: 40px;
            height: 40px;
            background-color: #4CAF50;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            border-radius: 5px;
        }

        .seat.selected {
            background-color: #f44336;
        }

        .seat.sold {
            background-color: #808080;
            cursor: not-allowed;
        }

        .seat-price {
            font-size: 14px;
            margin-top: 5px;
        }

        .price-display {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        
        /* Organizza la mappa e i posti affiancati */
        .map-seat-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .map-container {
            flex: 1;
            height: 300px;
            margin-top: 20px;
        }

        #seat-grid {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 5px;
        }
    </style>
    
    <!-- 
        Font
        https://fonts.google.com/
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    
</head>
<body id="bodyBasket">
    <!-- Navbar -->
    <nav id="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="shows.php"><img src="img/shows.png" alt="shows" class="icons">Shows</a></li>
            <li><a href="basket.php"><img src="img/shoppingCart.png" alt="shoppingCart" class="icons">Basket</a></li>
        </ul>
    </nav> 
    <!-- Content -->
    <div id="content">
        <section>
            <div class="content-text">
                <h1>Benvenuti alla zona di Acquisto</h1>
                <!-- Form -->
                <form id="show-form" method="POST">
                    <select id="citta" name="citta" onchange="mostraTeatri()" required>
                        <option value="" disabled selected>Seleziona la città</option>
                        <option value="ferrara">Ferrara</option>
                        <option value="bologna">Bologna</option>
                    </select>

                    <select id="teatro" name="teatro" required>
                        <option value="" disabled selected>Seleziona un teatro</option>
                    </select>

                    <select id="spettacolo" name="spettacolo" required>
                        <option value="" disabled selected>Seleziona uno spettacolo</option>
                    </select>

                    <input type="email" name="email" placeholder="Inserisci la tua email" required>

                    <div class="map-seat-container">
                        <div class="map-container" id="map-container">
                            <!-- La mappa sarà caricata qui -->
                        </div>
                        <div id="seat-grid" class="seat-grid">
                            <!-- I posti verranno popolati dinamicamente -->
                        </div>
                    </div>

                    <div id="price-display">Prezzo: €0</div>

                    <button type="submit" id="submit-btn">Acquista biglietto</button>
                </form>

                <script>
                    const data = {
                        ferrara: {
                            teatri: {
                                "Teatro Comunale Ferrara": {
                                    spettacoli: ["Cats", "Hamilton", "Miserables"],
                                    mappa: '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.225105935598!2d11.618151576068966!3d44.837348871070645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477e4e6b5316860b%3A0x1a1c82d1c2c3a643!2sTeatro%20Comunale%20di%20Ferrara!5e0!3m2!1sit!2sit!4v1734108640724!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                                    prezzi: {
                                        "Cats": [50, 40, 30, 20, 10],
                                        "Hamilton": [60, 50, 40, 30, 20],
                                        "Miserables": [55, 45, 35, 25, 15]
                                    }
                                }
                            }
                        },
                        bologna: {
                            teatri: {
                                "Teatro Comunale Bologna": {
                                    spettacoli: ["Cats", "Fantasma dell'Opera", "Oz"],
                                    mappa: '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2845.902344122817!2d11.3479916760496!3d44.496667771074634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477fd4bb8c6d1093%3A0x6d406ef45cc0f049!2sTeatro%20Comunale%20di%20Bologna!5e0!3m2!1sit!2sit!4v1734108679480!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                                    prezzi: {
                                        "Cats": [50, 40, 30, 20, 10],
                                        "Fantasma dell'Opera": [60, 50, 40, 30, 20],
                                        "Oz": [55, 45, 35, 25, 15]
                                    }
                                }
                            }
                        }
                    };

                    function mostraTeatri() {
                        const citta = document.getElementById("citta").value;
                        const teatroSelect = document.getElementById("teatro");
                        const spettacoloSelect = document.getElementById("spettacolo");

                        teatroSelect.innerHTML = '<option value="" disabled selected>Seleziona un teatro</option>';
                        spettacoloSelect.innerHTML = '<option value="" disabled selected>Seleziona uno spettacolo</option>';

                        if (!citta) return;

                        const teatri = data[citta]?.teatri;
                        if (!teatri) return;

                        for (const [teatro, info] of Object.entries(teatri)) {
                            const option = document.createElement("option");
                            option.value = teatro;
                            option.textContent = teatro;
                            teatroSelect.appendChild(option);
                        }
                    }

                    document.getElementById("teatro").addEventListener("change", function () {
                        const citta = document.getElementById("citta").value;
                        const teatro = this.value;
                        const spettacoloSelect = document.getElementById("spettacolo");

                        if (!citta || !teatro) return;

                        const spettacoli = data[citta].teatri[teatro]?.spettacoli || [];
                        spettacoloSelect.innerHTML = '<option value="" disabled selected>Seleziona uno spettacolo</option>';
                        
                        for (const spettacolo of spettacoli) {
                            const option = document.createElement("option");
                            option.value = spettacolo;
                            option.textContent = spettacolo;
                            spettacoloSelect.appendChild(option);
                        }
                    });

                    document.getElementById("spettacolo").addEventListener("change", function () {
                        const citta = document.getElementById("citta").value;
                        const teatro = document.getElementById("teatro").value;
                        const spettacolo = this.value;

                        if (!citta || !teatro || !spettacolo) return;

                        const teatroInfo = data[citta].teatri[teatro];
                        const mappaContainer = document.getElementById("map-container");
                        const seatGrid = document.getElementById("seat-grid");
                        const priceDisplay = document.getElementById("price-display");

                        mappaContainer.innerHTML = teatroInfo.mappa;

                        const prezzi = teatroInfo.prezzi[spettacolo];
                        seatGrid.innerHTML = '';

                        prezzi.forEach((prezzo, index) => {
                            for (let i = 0; i < 10; i++) { 
                                const seat = document.createElement("div");
                                seat.classList.add("seat");
                                seat.textContent = `${index + 1}${String.fromCharCode(65 + i)}`;
                                seat.onclick = () => toggleSeat(seat, prezzo);
                                seatGrid.appendChild(seat);
                            }
                        });

                        priceDisplay.textContent = `Prezzo: €${prezzi.join(", ")}`;
                    });

                    function toggleSeat(seat, prezzo) {
                        if (seat.classList.contains("sold")) return;
                        seat.classList.toggle("selected");
                        const selectedSeats = document.querySelectorAll(".seat.selected");
                        let totalPrice = 0;
                        selectedSeats.forEach(seat => {
                            totalPrice += prezzo;
                        });
                        document.getElementById("price-display").textContent = `Prezzo: €${totalPrice}`;
                    }
                </script>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $citta = $_POST['citta'];
                        $teatro = $_POST['teatro'];
                        $spettacolo = $_POST['spettacolo'];
                        $email = $_POST['email'];

                        $subject = "Conferma Acquisto Biglietti";
                        $message = "
                        Ciao,

                        Grazie per aver acquistato i tuoi biglietti! Ecco i dettagli:

                        Città: $citta
                        Teatro: $teatro
                        Spettacolo: $spettacolo

                        Cordiali saluti,
                        Il team di Biglietti per Spettacoli
                        ";

                        $headers = "From: info@teatro.com\r\n";
                        $headers .= "Reply-To: info@teatro.com\r\n";
                        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                        if (mail($email, $subject, $message, $headers)) {
                            echo "Email inviata con successo!";
                        } else {
                            echo "Si è verificato un errore nell'invio dell'email.";
                        }
                    }
                ?>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <footer id="footer">
        <p>&copy; 2024 Biglietti per Spettacoli. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>