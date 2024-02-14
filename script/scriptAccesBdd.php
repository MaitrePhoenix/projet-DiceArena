<?php

require_once "includes/inc_connexionBase.php";

function getJoueurById($id){
    $sql = "SELECT * FROM joueur";
    foreach ($cnx->query($sql) as $row) {
        print $row['id'] . "\t";
        print $row['pseudo'] . "\t";
    }
}
?>