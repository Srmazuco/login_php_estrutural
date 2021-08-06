<?php 
session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    try {
        $pdo = new PDO('mysql: host=localhost; dbname=db_login','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Forca mostrar o erro;
        $selecionar = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ");

        if($selecionar->rowCount() > 0){
            
            $dado = $selecionar->fetch();

            $_SESSION['id'] = $dado['id'];
            $_SESSION['email'] = $dado['email'];

            header("Location: index.php");
        }
    } catch(PDOException $e) {
        echo "Erro ao conectar: ".$e->getMessage();
    }
}

?>

<form method="post">
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="senha" placeholder="Senha"><br><br>
    <input type="submit" value="Entrar">
</form>