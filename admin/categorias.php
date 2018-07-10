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
        $categorias = new CategoriasController();
        $messageSuccess = false;
        $messageError = false;

        if(isset($_GET["deleteId"])){

            $id = $_GET["deleteId"];
            if ($categorias->deleteCategoria($id)){
                $messageSuccess = true;
            }else{
                $messageError = true;
            }
        }


    ?>
    <div class="container">
        <div class="row">             
            <div class="col-xs-12">
                <a href="<?php get_home();?>/admin/cad_categoria.php" class="btn btn-primary pull-right">Nova Categoria</a>
                <hr/>
                <?php if($messageSuccess): ?> 
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Sucesso!</strong> A categoria foi deletada com sucesso!
                    </div>
                <?php endif; ?> 
                <?php if($messageError): ?> 
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> Não foi deletar a categoria com o id indicado!
                    </div>
                <?php endif; ?> 
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-left">id_categoria</th>
                                    <th class="text-left">nome da categoria</th>
                                    <th width="60" class="text-left">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php                             
                                foreach ($categorias->getCategorias() as $category): ?>
                                <tr>
                                    <td class="text-left"><?php echo $category->id_categoria; ?></td>
                                    <td class="text-left"><?php echo $category->nome; ?></td>
                                    <td class="text-left">
                                        <a href="<?php echo get_home();?>/admin/edit_categoria.php?id=<?php echo $category->id_categoria;?>">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#confirm-delete" href="#" data-href="<?php echo get_home();?>/admin/categorias.php?deleteId=<?php echo $category->id_categoria;?>"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>