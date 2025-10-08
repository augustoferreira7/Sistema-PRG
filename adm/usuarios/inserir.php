<?php
    require_once("../../conexao.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nivel = $_POST["nivel"];

    // //md5
    // $senha = md5($senha);

    $id = $_POST["txtid2"];

    //password_hash
    $senha = password_hash("$senha", PASSWORD_BCRYPT);

    if($nome == ""){
        echo "O nome é um preenchimento obrigatório";
        exit();
    }

    if($email == ""){
        echo "O email é um preenchimento obrigatório";
        exit();
    }

    if($senha == ""){
        echo "A senha é um preenchimento obrigatório";
        exit();
    }


    if($id == ""){
        $res = $pdo->prepare("INSERT INTO usuarios(nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");

    }else{
        $res = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE id = '$id'");
    }


    $res->bindValue(":nome", $nome);
    $res->bindValue(":email", $email);
    $res->bindValue(":senha", $senha);
    $res->bindValue(":nivel", $nivel);

    $res->execute();
    echo "Salvo com Sucesso!";
?>