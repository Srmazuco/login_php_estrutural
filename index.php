<?php 

session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    echo "Bem vindo: ".$_SESSION['email'];
?>
    <br>
    <a href="excluir.php " onclick="destruir()">Sair</a>
<?php
}else {
    header("Location: login.php");
}
?>
