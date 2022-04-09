<?php
    include_once "funcao.php";

    $id = $_GET['id'];
    if ($terminal->foto != "") {
        unlink('imagens/'.$terminal->foto);
    }

    excluirTerminal($id);
    
    header("location: terminais.php");
?>
