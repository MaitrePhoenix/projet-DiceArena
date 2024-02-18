<?php

    try{
        $cnx = new PDO("mysql:host=localhost;dbname=DiceArena","dicearena","tropSimpl3");
    }catch (PDOException $e){
        echo $e->getMessage();
        $cnx=null;
    }

    