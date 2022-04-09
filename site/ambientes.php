<?php
include_once "funcao.php";
$ambientes= getAmbientes();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Ambiente</title>

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
    </style>

</head>

<body>
    <main class="container">
        <div class="bg-light p-5 rounded">
            <title>Ambientes</title>
            </head>
            <h1>Tipos de Ambiente</h1>
            <?php
            include_once "menu.php";
            ?>

            <a href="formAmbiente.php" class="btn btn-outline-primary">Novo</a>

                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Ambiente</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($ambientes as $ambiente) {
                            echo "<tr>
            <td>{$ambiente->id}</td>
            <td>{$ambiente->tipo_ambiente}</td>
            <td>
                <a href='editarAmbiente.php?id={$ambiente->id}' class='btn btn-outline-warning'>Editar</a>
                <a href='excluirAmbiente.php?id={$ambiente->id}' class='btn btn-outline-danger'>Excluir</a>
            </td>
            </tr>";
                        }

                        if (count($ambientes) == 0) {
                            echo "<tr><td colspan'3'>Nenhum Ambiente Cadastrado Ainda</tr></td>";
                        }
                        ?>

                    </tbody>
                </table>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
