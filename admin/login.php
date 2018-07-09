<?php
  // Verifica se não há a variável da sessão que identifica o usuário
  
    ob_start();
    session_start();
    if (isset($_SESSION['SESSION'])) {
        // Redireciona o visitante de volta pro login
        header("Location: index.php");
    }
    
    require "../config/config.php";
    require "../controllers/RedatoresController.php";

    $messageError = false;

    if (isset($_POST['entrar']) && $_POST['entrar'] == 'ok'){

        $redatoresController = new RedatoresController();


        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];

        if($redatoresController->login($matricula, $senha)){
            // Redireciona o usuário
            header("Location: index.php"); exit;  
        }else{
            $messageError = true;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php get_home();?>/assets/js/jquery.js"></script> 
    <script src="<?php get_home();?>/assets/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" type="text/css" media="screen" href="<?php get_home();?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php get_home();?>/assets/css/style.css" />
</head>
<body>

    <form name="form" method="post" id="form_login" class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php if($messageError): ?> 
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Os dados digitantos não conferem!
            </div>
        <?php endif; ?> 
        <fieldset>
            <div class="form-group">
            <label>Login:</label>
            <input class="form-control" required placeholder="matricula" id="matricula" name="matricula" autofocus>
            </div>
            <div class="form-group">
            <label>Senha:</label>
            <input class="form-control" required placeholder="Senha" name="senha" type="password" value="">
            </div>
            <input type="submit" class="btn btn-primary" value="Entrar" name="entrar">
            <input type="hidden" name="entrar" value="ok" />
        </fieldset>
    </form>
</body>
</html>    