<?php

    session_start();
    require_once "includes/inc_connexionBase.php";
    
    $text_request = "SELECT droits, login, pass ";
    $text_request.= "FROM users ";
    $text_request.= "WHERE login=:log;";

    $requete = $cnx->prepare($text_request);
    $requete ->bindParam(":log",$login);

    $requete->execute();

    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
?>