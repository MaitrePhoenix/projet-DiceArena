async function run(){
    let user = await verifierJoueur();
    console.log("Apres await",user);
    console.log(reponse);
}

run();
// Fonction pour vérifier si c'est à un joueur de jouer
function verifierJoueur() {
    // Effectuer une requête AJAX
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var reponse = xhr.responseText;
                // Analyser la réponse du serveur
                if (reponse === "true") {
                    console.log(reponse," : c'est a vous");
                    alert("C'est a vous - recharger la page");  
                } else {
                    console.log(reponse," : veuilliez attendre");
                    alert("Veuilliez attendre avant de recharger la page");
                }
            } else {
                // Gérer les erreurs de la requête
                console.error('Erreur lors de la requête AJAX : ' + xhr.status);
            }
        }
    };

    // Envoyer la requête au serveur
    xhr.open('GET', '../traitement/qui_joue.php', true);
    xhr.send();
}

// Sélectionner le bouton "Prendre la main"
var boutonPrendreLaMain = document.getElementById("btnDemande");

// Ajouter un écouteur d'événements pour le clic sur le bouton "Prendre la main"
boutonPrendreLaMain.addEventListener("click", prendreLaMain);


function prendreLaMain() {
    // Appeler la fonction pour vérifier si le joueur doit jouer
    verifierJoueur();
}

// -------------------------------------------------------------------- // 
// Fonction pour activer les actions du joueur
function activerActions() {
    // Activer les actions nécessaires pour que le joueur puisse jouer

	// Créer un bouton 'Valider saisie'
    var boutonValider = document.createElement('button');
    boutonValider.textContent = 'Valider saisie';
	document.body.appendChild(boutonValider);
    // boutonValider.addEventListener('click', function() {
    //     // Ajouter ici le code pour valider la saisie
    //     alert('Saisie validée !');
    // });

	// Créer un champ de saisie
    var champSaisie = document.createElement('input');
	champSaisie.type = "int"; //champSaisie.setAttribute('type', 'int');
    document.body.appendChild(champSaisie);

    // Créer un bouton 'Prendre la main'
    var boutonPrendreMain = document.createElement('button');
    boutonPrendreMain.textContent = 'Prendre la main';
	document.body.appendChild(boutonPrendreMain);
    // boutonPrendreMain.addEventListener('click', function() {
    //     // Ajouter ici le code pour demander si c'est au joueur de jouer
    //     alert('Demande envoyée pour savoir si c\'est à vous de jouer.');
    // });

    // Sélectionner l'élément conteneur où vous souhaitez ajouter ces éléments
    //var conteneurActions = document.getElementById('conteneur-actions');

    // Ajouter les éléments créés au conteneur
    //conteneurActions.appendChild(boutonValider);
    //conteneurActions.appendChild(champSaisie);
    //conteneurActions.appendChild(boutonPrendreMain);
}

// Fonction pour désactiver les actions du joueur
function desactiverActions() {
    // // Désactiver les actions nécessaires pour que le joueur ne puisse pas jouer

	// // Supprimer tous les éléments enfants du conteneur d'actions
    // var conteneurActions = document.getElementById('conteneur-actions');
    // conteneurActions.innerHTML = '';

	// Supprimer le bouton "Valider saisie"
    var boutonValider = document.querySelector("button");
    if (boutonValider) {
        boutonValider.parentNode.removeChild(boutonValider);
    }

    // Supprimer le champ de saisie
    var champSaisie = document.querySelector("input");
    if (champSaisie) {
        champSaisie.parentNode.removeChild(champSaisie);
    }

    // Supprimer le bouton "Prendre la main"
    var boutonPrendreMain = document.querySelectorAll("button")[1];
    if (boutonPrendreMain) {
        boutonPrendreMain.parentNode.removeChild(boutonPrendreMain);
    }

}

// Appeler la fonction pour vérifier le joueur lors du chargement de la page
// window.onload = function() {
//     verifierJoueur();
// };	

// -------------------------------------------------------------------- //