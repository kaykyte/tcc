<?php

if (!isset($ambiente)) {
    $ambiente = (object)['id' => 0, 'tipo_ambiente' => ''];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Formulário Ambiente</title>

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
    <?php
    include_once "menu.php";
    ?>

    <main class="container">
        <div class="bg-light p-5 rounded">
            <h1>Ambiente</h1>
            <form action="salvarAmbiente.php" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $ambiente->id; ?>">
                </div>
                <div class="mb-3">
                    <label for="tipo_ambiente" class="form-label">Tipo de ambiente</label>
                    <input type="text" class="form-control" id="tipo_ambiente" name="tipo_ambiente" value="<?php echo $ambiente->tipo_ambiente; ?>">
                </div>
                <button type="submit" class="btn btn-outline-primary">Gravar</button>
            </form>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>