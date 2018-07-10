<?php
require "../config/config.php";

class RedatoresController {


    public function login ( $matricula, $senha ){

        $pdo = conecta();

        try {
            $logar = $pdo->prepare("SELECT matricula, senha FROM redatores WHERE matricula = ? AND senha = ?");
        
            $logar->bindValue(1, $matricula, PDO::PARAM_INT);
            $logar->bindValue(2, $senha, PDO::PARAM_STR);
        
            $logar->execute();

            if ($logar->rowCount() == 1){      
                
                if (!isset($_SESSION)) session_start();

                // Salva os dados encontrados na sessão
                $_SESSION['SESSION'] = base64_encode(md5($matricula+$senha));                
                return true;                        
            }
            else
                return false;
        
        } catch (PDOException $e) {
            echo $e->Message();
        }
        
    }


}