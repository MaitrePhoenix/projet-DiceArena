<?php

$cnx=null;
try{
    //Ne pas taper le port de l'hote 127.0.0.0
    //git ignor
    $cnx = new PDO("mysql:host=localhost;dbname=DiceArena","dicearena","tropSimpl3");
}catch (PDOException $e){// $e est une exception PDO
    echo $e->getMessage();
}

function getJoueurById($id){
    global $cnx;
    $stmt = $dbh->prepare("Select id, pseudo");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':value', $value);

}