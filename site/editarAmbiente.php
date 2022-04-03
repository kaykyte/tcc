<?php
    include_once "funcao.php";

    $id = $_GET['id'];
    $ambiente = getAmbienteById ($id);

    include_once "formAmbiente.php"


?>