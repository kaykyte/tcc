<?php

    include_once "funcao.php";

    $ambiente = array();
    $ambiente['id'] = $_POST['id'];
    $ambiente['tipo_ambiente'] = $_POST['tipo_ambiente'];
    salvarAmbiente($ambiente);
    
    header("location: ambientes.php");
?>