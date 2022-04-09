<?php
include_once "funcao.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Terminal</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    body {
      min-height: 75rem;
      padding-top: 4.5rem;
    }
    img {
        width: 100px;
        border: 1px solid gray;
        padding: 0.5rem;
        border-radius: 10px;
      }
  </style>

</head>

<body>
  <?php
  include_once "menu.php";
  ?>

  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1>Lista das Aferições de Qualidade do Ar</h1>
      <table class="table table-hover table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th></th>
            <th>Umidade</th>
            <th>Temperatura</th>
            <th>Gás Predominante</th>
            <th>Nível de Gás</th>
            <th>Data de Aferição</th>
            <th>Tipo de Ambiente</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $terminais = getTerminais();
          foreach ($terminais as $terminal) {
            if ($terminal->data_afericao != "") {
              $data = date("d/m/Y", strtotime($terminal->data_afericao));
            } else {
              $data = "";
            }
            if ($terminal->foto != "") {
              $foto = $terminal->foto;
            } else {
              $foto = "indefinido.png";
            }
            echo "<tr>
            <td>{$terminal->id}</td>
            <td><img src='imagens/$foto'></td>
            <td>{$terminal->umidade}%</td>
            <td>{$terminal->temperatura}°C</td>
            <td>{$terminal->gas}</td>
            <td>{$terminal->nivel_gas}%</td>
            <td>$data</td>
            <td>{$terminal->tipo_ambiente}</td>
            <td>
              <a href='excluirTerminal.php?id={$terminal->id}' class='btn btn-outline-danger'>Excluir</a>
              <a href='editarTerminal.php?id={$terminal->id}' class='btn btn-outline-warning'>Editar</a>
            </td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
      <a href="formTerminal.php" class="btn btn-outline-primary">Novo</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
