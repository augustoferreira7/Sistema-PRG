<?php
    require_once("../../conexao.php");

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];

    // //md5
    // $senha = md5($senha);

    $id = $_POST["txtid2"];

    //password_hash
    

    if($nome == ""){
        echo "O nome é um preenchimento obrigatório";
        exit();
    }
    if($cpf == ""){
        echo "O cpf é um preenchimento obrigatório";
        exit();
    }
    if($telefone == ""){
        echo "O telefone é um preenchimento obrigatório";
        exit();
    }

    if($email == ""){
        echo "O email é um preenchimento obrigatório";
        exit();
    }

    if($endereco == ""){
        echo "A endereco é um preenchimento obrigatório";
        exit();
    }


    if($id == ""){
        $res = $pdo->prepare("INSERT INTO clientes(nome, cpf, telefone, email, endereco) VALUES (:nome, :cpf, :telefone, :email, :endereco)");

    }else{
        $res = $pdo->prepare("UPDATE clientes SET nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, endereco = :endereco WHERE id = '$id'");
    }


    $res->bindValue(":nome", $nome);
    $res->bindValue(":cpf", $cpf);
    $res->bindValue(":telefone", $telefone);
    $res->bindValue(":email", $email);
    $res->bindValue(":endereco", $endereco);

    $res->execute();
    echo "Salvo com Sucesso!";
?>