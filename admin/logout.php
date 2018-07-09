<?php
	session_start(); // Inicia a sessão
	session_destroy(); // Destrói a sessão limpando todos os valores salvos
	session_write_close();
  header("Location: login.php"); exit; // Redireciona o visitante
?>