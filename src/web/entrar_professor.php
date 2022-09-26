<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="styles/styles_m/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles/styles_m/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="styles/styles_m/entrar_escola.css">

    <!-- Navbar Css  -->
    <link rel="stylesheet" href="styles/styles_m/navbar-index.css">
    <link rel="stylesheet" href="styles/theme.css">

    <title>Entrar na QUIRON</title>
  </head>
  <body>
  
  <?php include('partials/navbar-index.php'); ?>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/svgs/img_login.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <br>
              <h3>QUÍRON</h3>
              <p class="mb-4">Sua próxima vaga de emprego na palma da sua mão.</p>
            </div>
            <form action="#" method="post">
              <div class="form input">
                <label for="username">Usuário</label>
                <input type="text" class="form-control" id="username">

              </div>
              <div class="form input">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Lembrar de mim?</span>
                  <input type="checkbox"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="esqueci_senha.php" class="forgot-pass">Esqueceu a senha?</a></span> <br>
                <span class="ml-auto"><a href="cadastrar_professor.php" class="forgot-pass">Criar Conta</a></span>
              </div>

              <input type="submit" value="Entrar" class="btn btn-block btn-primary">


              
             

              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="scripts/jquery_login.min.js"></script>
    <script src="scripts/popper_login.min.js"></script>
    <script src="scripts/bootstrap_login.min.js"></script>
    <script src="scripts/main_login.js"></script>
  </body>
</html>