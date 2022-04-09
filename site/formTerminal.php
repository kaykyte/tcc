<?php
include_once "funcao.php";
//verifica se a várialvel terminal não existe
if (!isset($terminal)) {
    $terminal = (object)[
        'id' => 0, 'umidade' => 0, 'temperatura' => 0,
        'gas' => '', 'nivel_gas' => '', 'ambiente_id' => 0, 'foto' => ''
    ];
}
if ($terminal->foto != "") {
    $foto = $terminal->foto;
} else {
    $foto = "indefinido.png";
}

if (!isset($ambientes)) {
    $ambientes = getAmbientes();
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
    <title>Formulário Terminal</title>

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

            <h1>Terminal</h1>
            <img src="imagens/<?php echo $foto; ?>">
            <form action="salvarTerminal.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="foto" value="<?php echo $terminal->foto; ?>">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $terminal->id; ?>">
                </div>
                <div class="mb-3">
                    <label for="umidade" class="form-label">Umidade</label>
                    <input type="number" class="form-control" id="umidade" name="umidade" value="<?php echo $terminal->umidade; ?>">
                </div>
                <div class="mb-3">
                    <label for="temperatura" class="form-label">Temperatura</label>
                    <input type="text" class="form-control" id="temperatura" name="temperatura" value="<?php echo $terminal->temperatura; ?>">
                </div>
                <div class="mb-3">
                    <label for="gas" class="form-label">Gás Predominante</label>
                    <input type="text" class="form-control" id="gas" name="gas" value="<?php echo $terminal->gas; ?>">
                </div>
                <div class="mb-3">
                    <label for="nivel_gas" class="form-label">Nível de Gás</label>
                    <input type="number" class="form-control" id="nivel_gas" name="nivel_gas" value="<?php echo $terminal->nivel_gas; ?>">
                </div>
                <div class="mb-3">
                    <label for="ambiente_id" class="form-label">Tipo de Ambiente</label>
                    <select class="form-select" aria-label="Default select example" name="ambiente_id">
                        <?php
                        foreach ($ambientes as $ambiente) {
                            $selected = "";
                            if ($terminal->ambiente_id == $ambiente->id) {
                                $selected = "selected";
                            }
                            echo "<option $selected value='{$ambiente->id}'>{$ambiente->tipo_ambiente}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="data_afericao" class="form-label">Data de Aferição</label>
                    <input type="date" class="form-control" id="data_afericao" name="data_afericao" value="<?php echo $terminal->data_afericao; ?>">
                </div>
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Foto do Ambiente</label>
                    <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/*">
                </div>
                <button type="submit" class="btn btn-outline-primary">Gravar</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
