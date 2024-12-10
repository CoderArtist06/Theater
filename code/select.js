function mostraTeatri() {
    const citta = document.getElementById("citta").value;
    const teatroSelect = document.getElementById("teatro");

    // Pulisci le opzioni precedenti
    teatroSelect.innerHTML = "";

    // Se è stata selezionata una città, abilita il menu dei teatri e aggiungi le opzioni
    if (citta) {
        teatroSelect.disabled = false;  // Abilita la selezione del teatro

        // Aggiungi le opzioni per i teatri in base alla città selezionata
        let teatri;
        if (citta === "ferrara") {
            teatri = ["Teatro Comunale Ferrara", "Teatro Nova Ferrara"];
        } else if (citta === "bologna") {
            teatri = ["Teatro Comunale Bologna", "Teatro Duse Bologna"];
        }

        // Aggiungi le opzioni dei teatri nel select
        teatri.forEach(function(teatro) {
            const option = document.createElement("option");
            option.value = teatro;
            option.textContent = teatro;
            teatroSelect.appendChild(option);
        });
    } else {
        teatroSelect.disabled = true;  // Rende disabilitato il select dei teatri
    }
}