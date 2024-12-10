
// Effetto Parallax
// Aggiungi un event listener per lo scroll
window.addEventListener("scroll", function() {
    parallaxEffect();
});

// Funzione per applicare l'effetto Parallax
function parallaxEffect() {
    // Ottieni l'immagine di sfondo
    var backgroundImage = document.querySelector('.background-image');
    var OverlayImage = document.querySelector('.overlay');
    var Footer = document.querySelector('#footer');

    // Calcola la quantità di movimento in base alla posizione di scroll
    var scrollPosition = window.pageYOffset;

    // Applica l'effetto parallax modificando la posizione dell'immagine
    // L'immagine si muoverà ad una velocità inferiore rispetto allo scroll
    backgroundImage.style.transform = "translateY(" + scrollPosition * 0.5 + "px)";
    OverlayImage.style.transform = "translateY(" + scrollPosition * 0.5 + "px)";

    // Limita il movimento del footer per evitare che vada troppo in basso
    // Puoi regolare il limite a piacere (es. 50px è un buon punto di partenza)
    var footerMovement = Math.min(scrollPosition * 0.5, 50); 
    Footer.style.transform = "translateY(" + footerMovement + "px)";
}