<?php
    include_once "funcao.php";

    $id = $_GET['id'];
    $terminal = getTerminalById ($id);
    $ambientes = getAmbientes();

    include_once "formTerminal.php";
?>