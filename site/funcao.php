<?php
  function getConnection() {
    $conexao = new PDO('pgsql:host=localhost;dbname=tcc', 'postgres', 'postgres');
    return $conexao;
  }

  function getTerminais() {
    $conexao = getConnection();
    $sql = "SELECT terminal.*, ambiente.tipo_ambiente AS tipo_ambiente
    FROM terminal LEFT JOIN ambiente ON ambiente_id = ambiente.id ORDER BY data_afericao";
    $sentenca = $conexao->query($sql);
    $dados = $sentenca->fetchAll(PDO::FETCH_CLASS);
    return $dados;
  }

  function getAmbientes() {
    $conexao = getConnection();
    $sql = "SELECT * FROM ambiente ORDER BY tipo_ambiente";
    $sentenca = $conexao->query($sql);
    $dados = $sentenca->fetchAll(PDO::FETCH_CLASS);
    return $dados;
  }

  function insertTerminal($terminal){
    $conexao = getConnection();
    $sql = "INSERT INTO terminal(umidade, temperatura, gas, nivel_gas, data_afericao, foto, ambiente_id) VALUES (?,?,?,?,?,?,?)";
    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(1, $terminal['umidade']);
    $sentenca->bindParam(2, $terminal['temperatura']);
    $sentenca->bindParam(3, $terminal['gas']);
    $sentenca->bindParam(4, $terminal['nivel_gas']);
    $sentenca->bindParam(5, $terminal['data_afericao']);
    $sentenca->bindParam(6, $terminal['foto']);
    $sentenca->bindParam(7, $terminal['ambiente_id']);

    $sentenca->execute();
  }
  
  function insertAmbiente($ambiente){
    $conexao = getConnection();
    $sql = "INSERT INTO ambiente(tipo_ambiente) VALUES (?)";
    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(1, $ambiente['tipo_ambiente']);

    $sentenca->execute();
  }

  function updateTerminal($terminal){
    $conexao = getConnection();
    $sql = "UPDATE terminal SET umidade=?, temperatura=?, gas=?, nivel_gas=?, ambiente_id=?, data_afericao=?, foto=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(1, $terminal['umidade']);
    $sentenca->bindParam(2, $terminal['temperatura']);
    $sentenca->bindParam(3, $terminal['gas']);
    $sentenca->bindParam(4, $terminal['nivel_gas']);
    $sentenca->bindParam(5, $terminal['ambiente_id']);
    $sentenca->bindParam(6, $terminal['data_afericao']);
    $sentenca->bindParam(7, $terminal['foto']);
    $sentenca->bindParam(8, $terminal['id']);

    $sentenca->execute();
  }

  function updateAmbiente($ambiente){
    $conexao = getConnection();
    $sql = "UPDATE ambiente SET tipo_ambiente=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(1, $ambiente['tipo_ambiente']);
    $sentenca->bindParam(2, $ambiente['id']);

    $sentenca->execute();
  }

  function salvarTerminal($terminal){
    if ($terminal['id'] == 0){
      insertTerminal($terminal);
    } else {
      updateTerminal($terminal);
    }
  }

  function salvarAmbiente($ambiente){
    if ($ambiente['id'] == 0){
      insertAmbiente($ambiente);  
    } else {
      updateAmbiente($ambiente);
    }
  }


  function excluirTerminal($id){
    $conexao = getConnection();
    $sql = "DELETE FROM terminal WHERE id=?";
    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(1, $id);

    $sentenca->execute();
  }

  function excluirAmbiente($id){
    $conexao = getConnection();
    $sql = "DELETE FROM ambiente WHERE id=?";
    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(1, $id);

    $sentenca->execute();
  }

  function getTerminalById($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM terminal WHERE id=?";
    $sentenca = $conexao -> prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $terminal = $sentenca->fetch(PDO::FETCH_OBJ);
    return $terminal;
  }
  
  function getAmbienteById($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM ambiente WHERE id=?";
    $sentenca = $conexao -> prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $ambiente = $sentenca->fetch(PDO::FETCH_OBJ);
    return $ambiente;
  }

 ?>

