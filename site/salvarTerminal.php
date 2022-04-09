<?php

    include_once "funcao.php";

    $terminal = array();
    $terminal['id'] = $_POST['id'];
    $terminal['umidade'] = $_POST['umidade'];
    $terminal['temperatura'] = $_POST['temperatura'];
    $terminal['gas'] = $_POST['gas'];
    $terminal['nivel_gas'] = $_POST['nivel_gas'];
    $terminal['data_afericao'] = $_POST['data_afericao'];
    $terminal['ambiente_id'] = $_POST['ambiente_id'];
    $terminal['foto'] = $_POST['foto'];
    $arquivo = $_FILES['arquivo'];
    if (isset($arquivo) && $arquivo['size'] != 0) {
      if ($terminal['foto'] != "") {
        unlink('imagens/'.$terminal['foto']);
      }
      $nome_arquivo = $arquivo['name'];
      $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
      $nomeArquivoSalvo = sha1(time()).".".$extensao;
      $arquivo_temporario = $arquivo['tmp_name'];
      move_uploaded_file($arquivo_temporario, 'imagens/'.$nomeArquivoSalvo);
      $terminal['foto'] = $nomeArquivoSalvo;
  }
    salvarTerminal($terminal);
    
    header("location: terminais.php");
?>
