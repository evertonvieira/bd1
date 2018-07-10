<?php
    session_start();
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['SESSION']) ) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: login.php"); exit;
    }
    
    require "../controllers/CategoriasController.php";

    $messageError = false;
    $messageSuccess = false;

    if (isset($_POST['salvar']) && $_POST['salvar'] == 'ok'){

        $categoria = new CategoriasController();
        
        $nomeCategoria = $_POST['categoria'];       

        if($categoria->addCategoria($nomeCategoria)){
            $messageSuccess = true;
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
    <title>Administração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php get_home();?>/assets/js/jquery.js"></script> 
    <script src="<?php get_home();?>/assets/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" type="text/css" media="screen" href="<?php get_home();?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php get_home();?>/assets/css/style.css" />
</head>
<body>
    <?php 
        include "elements/header.php";        
    ?>

    <div class="container">
        <div class="row">
            <form name="form" method="post" id="form_login" class="" role="form">
                <h2 class="form-signin-heading">Cadastrar categoria</h2>
                <?php if($messageSuccess): ?> 
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Sucesso!</strong> A categoria foi cadastrada com sucesso!
                    </div>
                <?php endif; ?> 
                <?php if($messageError): ?> 
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> Não foi possível cadastrar a categoria com o nome indicado!
                    </div>
                <?php endif; ?> 
                <fieldset>
                    <div class="form-group">
                        <label>Nome da Categoria:</label>
                        <input class="form-control input-lg" required placeholder="nome da categoria" id="categoria" name="categoria">
                    </div>                    
                    <input type="submit" class="btn btn-primary" value="Salvar" name="entrar">
                    <input type="hidden" name="salvar" value="ok" />
                </fieldset>
            </form>
        </div>
    </div>

    
</body>
</html>