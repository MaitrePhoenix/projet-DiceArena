<?php

    try{
        //Ne pas taper le port de l'hote 127.0.0.0
        //git ignor
        $cnx = new PDO("mysql:host=localhost;dbname=DiceArena","dicearena","tropSimpl3");
    }catch (PDOException $e){// $e est une exception PDO
        echo $e->getMessage();
        $cnx=null;
    }

    