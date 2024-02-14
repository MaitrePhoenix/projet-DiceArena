<?php

$cnx="salut";
try{
    //Ne pas taper le port de l'hote 127.0.0.0
    //git ignor
    $cnx = new PDO("mysql:host=localhost;dbname=DiceArena","dicearena","tropSimpl3");
}catch (PDOException $e){// $e est une exception PDO
    echo $e->getMessage();
}

function getJoueurById($id, $cnx){
    $sql = "SELECT * FROM joueur";
    foreach ($cnx->query($sql) as $row) {
        print $row['id'] . "\t";
        print $row['login'] . "\t";
    }
}