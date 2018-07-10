<?php
    require "../config/config.php";
    session_start();
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['SESSION']) ) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: login.php"); exit;
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
    <?php include "elements/header.php"; ?>
</body>
</html>