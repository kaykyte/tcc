<?php
    include_once "funcao.php";

    $id = $_GET['id'];

    excluirAmbiente($id);
    
    header("location: ambientes.php");
?>