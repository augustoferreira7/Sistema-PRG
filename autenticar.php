<?php
    require_once("conexao.php");

    @session_start();

    $email = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $query ->bindValue( "email", $email);
    $query->execute();

    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    $email_bd = $res[0]['email'];
    $senha_bd = $res[0]['senha'];

    if($email == $email_bd && password_verify($senha, $senha_bd)){
        $_SESSION['nome_usuario'] = $res[0]['nome'];
        $_SESSION['nivel_usuario'] = $res[0]['nivel'];

        $nivel = $res[0]['nivel'];

        if($nivel == 'administrador'){
            header("location:adm/index.php");
            exit();
        }
    }else{
        echo "<script>alert('Usuário e/ou Senha incorreto(s).');</script>";
        echo "<script>window.location='index.php';</script>";
    }
?>