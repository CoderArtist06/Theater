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

        .map-container {
            margin-top: 20px;
            height: 300px;
            width: 100%;
            background-color: #ddd;
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
                <form id="show-form" method="GET">
                    <!-- Selezione della città -->
                    <select id="citta" name="citta" onchange="mostraTeatri()" required>
                        <option value="" disabled selected>Seleziona la città</option>
                        <option value="ferrara">Ferrara</option>
                        <option value="bologna">Bologna</option>
                    </select>

                    <!-- Selezione del teatro -->
                    <select id="teatro" name="teatro" required>
                        <option value="" disabled selected>Seleziona un teatro</option>
                    </select>

                    <!-- Selezione dello spettacolo -->
                    <select id="spettacolo" name="spettacolo" required>
                        <option value="" disabled selected>Seleziona uno spettacolo</option>
                    </select>

                    <!-- Mappa geografica -->
                    <div class="map-container" id="map-container">
                        <!-- Mappa del teatro si caricherà qui -->
                    </div>

                    <!-- Griglia di posti -->
                    <div id="seat-grid" class="seat-grid">
                        <!-- I posti verranno popolati dinamicamente -->
                    </div>

                    <!-- Prezzo -->
                    <div class="price-display" id="price-display">Prezzo: €0</div>

                    <button type="submit">Acquista biglietto</button>
                </form>

                <script>
                    // Dati per le città, teatri e spettacoli (simulazione)
                    const data = {
                        ferrara: {
                            teatri: {
                                "Teatro Comunale": {
                                    spettacoli: ["La Traviata", "Carmen", "Rigoletto"],
                                    mappa: "Mappa Teatro Comunale Ferrara",
                                    prezzi: {
                                        "La Traviata": [50, 40, 30, 20, 10], // Prezzi per ciascuna fila
                                        "Carmen": [60, 50, 40, 30, 20],
                                        "Rigoletto": [55, 45, 35, 25, 15]
                                    }
                                }
                            }
                        },
                        bologna: {
                            teatri: {
                                "Teatro Duse": {
                                    spettacoli: ["Otello", "Don Giovanni", "Madama Butterfly"],
                                    mappa: "Mappa Teatro Duse Bologna",
                                    prezzi: {
                                        "Otello": [70, 60, 50, 40, 30],
                                        "Don Giovanni": [65, 55, 45, 35, 25],
                                        "Madama Butterfly": [60, 50, 40, 30, 20]
                                    }
                                }
                            }
                        }
                    };

                    function mostraTeatri() {
                        const city = document.getElementById('citta').value;
                        const teatroSelect = document.getElementById('teatro');
                        const spettacoloSelect = document.getElementById('spettacolo');
                        const mapContainer = document.getElementById('map-container');
                        const seatGrid = document.getElementById('seat-grid');
                        const priceDisplay = document.getElementById('price-display');

                        // Pulisci le opzioni precedenti
                        teatroSelect.innerHTML = "<option value='' disabled selected>Seleziona un teatro</option>";
                        spettacoloSelect.innerHTML = "<option value='' disabled selected>Seleziona uno spettacolo</option>";
                        seatGrid.innerHTML = ""; // Pulisci la griglia dei posti
                        priceDisplay.textContent = "Prezzo: €0";
                        mapContainer.textContent = ""; // Pulisci la mappa

                        if (!city) return;

                        const teatri = data[city]?.teatri || {};
                        for (const teatro in teatri) {
                            const option = document.createElement("option");
                            option.value = teatro;
                            option.textContent = teatro;
                            teatroSelect.appendChild(option);
                        }
                    }

                    document.getElementById('teatro').addEventListener('change', function() {
                        const city = document.getElementById('citta').value;
                        const teatro = this.value;
                        const spettacoloSelect = document.getElementById('spettacolo');
                        const mapContainer = document.getElementById('map-container');
                        const seatGrid = document.getElementById('seat-grid');
                        const priceDisplay = document.getElementById('price-display');

                        if (!city || !teatro) return;

                        const teatroData = data[city]?.teatri[teatro];
                        if (teatroData) {
                            // Mostra la mappa del teatro
                            mapContainer.textContent = teatroData.mappa;

                            // Aggiungi gli spettacoli
                            spettacoloSelect.innerHTML = "<option value='' disabled selected>Seleziona uno spettacolo</option>";
                            teatroData.spettacoli.forEach(spettacolo => {
                                const option = document.createElement("option");
                                option.value = spettacolo;
                                option.textContent = spettacolo;
                                spettacoloSelect.appendChild(option);
                            });

                            // Aggiungi la griglia dei posti e i prezzi
                            const prezzi = teatroData.prezzi[spettacoloSelect.value];
                            if (prezzi) {
                                createSeatGrid(prezzi);
                            }
                        }
                    });

                    document.getElementById('spettacolo').addEventListener('change', function() {
                        const city = document.getElementById('citta').value;
                        const teatro = document.getElementById('teatro').value;
                        const spettacolo = this.value;
                        const seatGrid = document.getElementById('seat-grid');
                        const priceDisplay = document.getElementById('price-display');

                        if (!city || !teatro || !spettacolo) return;

                        const teatroData = data[city]?.teatri[teatro];
                        if (teatroData) {
                            const prezzi = teatroData.prezzi[spettacolo];
                            if (prezzi) {
                                createSeatGrid(prezzi);
                                priceDisplay.textContent = `Prezzo: €${prezzi[0]}`; // Prezzo della prima fila
                            }
                        }
                    });

                    function createSeatGrid(prezzi) {
                        const seatGrid = document.getElementById('seat-grid');
                        seatGrid.innerHTML = ""; // Pulisci la griglia dei posti

                        for (let row = 0; row < prezzi.length; row++) {
                            for (let col = 0; col < 10; col++) { // 10 posti per fila
                                const seat = document.createElement('div');
                                seat.classList.add('seat');
                                seat.textContent = `${row + 1}-${col + 1}`;
                                seat.dataset.row = row;
                                seat.dataset.col = col;
                                seat.dataset.price = prezzi[row];

                                seat.addEventListener('click', function() {
                                    if (!seat.classList.contains('sold')) {
                                        seat.classList.toggle('selected');
                                        updatePrice();
                                    }
                                });

                                seatGrid.appendChild(seat);
                            }
                        }
                    }

                    function updatePrice() {
                        const selectedSeats = document.querySelectorAll('.seat.selected');
                        let totalPrice = 0;
                        selectedSeats.forEach(seat => {
                            totalPrice += parseFloat(seat.dataset.price);
                        });
                        document.getElementById('price-display').textContent = `Prezzo: €${totalPrice}`;
                    }
                </script>
            </div>
        </section>
    </div>
    <div id="footer">
        <p>
            © 2024 Theater. All rights reserved. <br>
            <a href="about.html">About Us</a>
        </p>
    </div>
</body>
</html>