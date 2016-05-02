<?php

  header('Content-Type: application/json');

  if( isset($_POST['email']) && isset($_POST['senha']) ){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try{
      $db = new PDO("pgsql:host=localhost dbname=interacaototal user=postgres password=postgres");

      $stmt = $db->prepare("SELECT * FROM usuario WHERE email=:email AND senha=:senha");
      $stmt->execute(array(':email'=>$email, ':senha'=>$senha));

      if($stmt->rowCount() > 0){
        echo '{"mensagem":"Usuário logado com sucesso!"}';
      }else{
        http_response_code(422); //Código para erro nos parâmetros
        echo '{"mensagem":"Verifique se o e-mail e a sua senha foram digitados corretamente!"}';
      }

    }catch(PDOException $e){
      echo $e->getMessage();
    }

  }
?>
