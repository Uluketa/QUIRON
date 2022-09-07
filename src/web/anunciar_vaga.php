<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUÍRON</title>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/anunciar_vaga.css">
    
</head>
<body>
<br>

<?php include('partials/header.php'); ?>

<center>
    <div class="container1">
        <div class="header">
            <h1 id="title">Anunciar Vaga</h1>
        </div>

        <div class="div-container">
            <div class="div-sub-container">
                <form class="form">
                    <label for="name">Nome da matéria: </label><br>
                    <input class='input-textarea' type="text"> <br><br>

                    <label for="name">Link de acesso no CPS:</label><br>
                    <input class='input-textarea' type="url"> <br><br>

                    <label for="name">Descrição da vaga:</label><br>
                    <textarea class='input-textarea'></textarea> <br><br>

                    <label for="name">Requisito da vaga:</label><br>
                    <textarea class='input-textarea'></textarea> <br><br>

                    <label for="name">Carga horária semanal:</label><br>
                    <input class='input-textarea' type="text"> <br><br>

                    <label for="name">Média salarial:</label><br>
                    <input class='input-textarea' type="text"> <br><br>
            </div>

            <div class="linhaMeio"></div>

                <center>
                <div class="div-sub-container-2">
                    <div class="ab">
                    </div>
                    <div class="ab">
                            <br>
                            <input type="submit" class='botao-001' value="Anunciar Vaga">
                        </form>
                            <br>
                        <img src="images/2.png" class="img-anunciar">
                    </div>
                    <div class="ab">
                    </div>
                    
                </center>
            </div>
        </div>
    </div>
</center>
<br>
<?php include('partials/footer.php'); ?>
</body>
</html>