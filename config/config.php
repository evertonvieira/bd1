<?php
    
    error_reporting(E_ALL);
	ini_set("display_errors", 1);

    function get_home(){
        echo "http://localhost/ProjetoFinal";
    }

    header('Content-Type: text/html; charset=utf-8');

    define('HOST','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('DB','ProjetoBD1');

    function conecta(){
        $dns = "mysql:host=".HOST.";dbname=".DB;

        try{
            $conn = new PDO($dns, USUARIO, SENHA);
            $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $conn->query("SET NAMES 'utf8'");
            $conn->query("SET character_set_connection=utf8");
            $conn->query("SET character_set_client=utf8");
            $conn->query("SET character_set_results=utf8");

            return $conn;
        }catch(PDOException $erro) {
            echo $erro -> getMessage();
        }
    }
?>
