<?php
require "../config/config.php";

class CategoriasController {


    public function getCategorias(){

        $pdo = conecta();

        try {
            $getCategorias = $pdo->prepare("SELECT * FROM categorias");
        
            $getCategorias->execute();
                
            return $getCategorias->fetchAll(PDO::FETCH_OBJ);                    
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function addCategoria($nome){

        $pdo = conecta();

        try {
            $addCategoria = $pdo->prepare("INSERT INTO categorias (nome) VALUES (?)");                   
            $addCategoria->bindValue(1,$nome, PDO::PARAM_STR);
            $addCategoria->execute();

            if ($addCategoria->rowCount() > 0)
                return true;
            else
                return false;
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function deleteCategoria($id){

        $pdo = conecta();

        try {
            $deleteCategoria = $pdo->prepare("DELETE FROM categorias WHERE id_categoria = ?");                   
            $deleteCategoria->bindValue(1,$id, PDO::PARAM_INT);
            $deleteCategoria->execute();

            if ($deleteCategoria->rowCount() > 0)
                return true;
            else
                return false;
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function getCategoria($id){

        $pdo = conecta();

        try {
            $getCategoria = $pdo->prepare("SELECT * FROM categorias WHERE id_categoria = ?");                   
            $getCategoria->bindValue(1, $id, PDO::PARAM_INT);
            $getCategoria->execute();

            if ($getCategoria->rowCount() > 0)
                return $getCategoria->fetchAll(PDO::FETCH_OBJ);  
            else
                return false;
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function editCategoria($nome, $id){

        $pdo = conecta();

        try {
            $editCategoria = $pdo->prepare("UPDATE categorias SET nome = ? WHERE id_categoria = ?");                   
            $editCategoria->bindValue(1, $nome, PDO::PARAM_STR);
            $editCategoria->bindValue(2, $id, PDO::PARAM_INT);
            $editCategoria->execute();

            if ($editCategoria->rowCount() > 0)
                return true;  
            else
                return false;
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }


}