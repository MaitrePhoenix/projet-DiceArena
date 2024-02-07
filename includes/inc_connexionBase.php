<?php

    try{
        //$cnx = new PDO("mysql:host=mysql;dbname=tpweb","tpweb","TyTy1234");
        //Ne pas taper le port de l'hote 127.0.0.0
        //git ignor
        $cnx = new PDO("mysql:host=localhost;dbname=DiceArena","tpweb","tropSimpl3");
    }catch (PDOException $e){// $e est une exception PDO
        echo $e->getMessage();
        $cnx=null;
    }

    