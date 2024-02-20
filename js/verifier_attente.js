function attenteJoueur() {
    document.addEventListener("DOMContentLoaded", function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === "waiting") {
                        alert("En attente d'un second joueur...");
                    }
                } else {
                    console.error("Erreur lors de la requête AJAX : " + xhr.status);
                }
            }
        };
        xhr.open("GET", "verifier_attente.php", true);
        xhr.send();
    });
}

// Appeler la fonction pour vérifier le joueur lors du chargement de la page
window.onload = function() {
    verifierJoueur();
};	