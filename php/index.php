<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Ulbra - Interação total 2016</title>
  </head>

  <body>

    <!-- Alteramos o form para fazer a requisição POST -->
    <form method="post">

      <?php

        if( isset($_POST['email']) && isset($_POST['senha']) ){
          $email = $_POST['email'];
          $senha = $_POST['senha'];

          try{
            $db = new PDO("pgsql:host=localhost dbname=interacaototal user=postgres password=postgres");

            $stmt = $db->prepare("SELECT * FROM usuario WHERE email=:email AND senha=:senha LIMIT 1");
            $stmt->execute(array(':email'=>$email, ':senha'=>$senha));
            $usuario=$stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0){
              echo '<span class="sucesso">Usuario logado com sucesso!</span>';
            }else{
              echo '<span class="erro">Verifique se o e-mail e a sua senha foram digitados corretamente!</span>';
            }

          }catch(PDOException $e){
            echo $e->getMessage();
          }

        }
      ?>

      <div class="input-container">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>

      <div class="input-container">
        <label>Senha</label>
        <input type="password" name="senha" required>
      </div>

      <button type="submit">Logar</button>


    </form>

    <style>

      body{
        height: 100vh;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #4cd964;
        background: -moz-linear-gradient(45deg,#4cd964 0%,#5ac8fa 100%);
        background: -webkit-gradient(left bottom,right top,color-stop(0%,#4cd964),color-stop(100%,#5ac8fa));
        background: -webkit-linear-gradient(45deg,#4cd964 0%,#5ac8fa 100%);
        background: -o-linear-gradient(45deg,#4cd964 0%,#5ac8fa 100%);
        background: -ms-linear-gradient(45deg,#4cd964 0%,#5ac8fa 100%);
        background: linear-gradient(45deg,#4cd964 0%,#5ac8fa 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4cd964',endColorstr='#5ac8fa',GradientType=1);

      }

      form{
        position: relative;
        width: 50vw;
        height: 50vh;

        border-radius: 8px;

        webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);

        background: linear-gradient(to right, rgba(237, 237, 238, 1), #f7f7f8);

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
      }

      form:before{
        content: 'PHP exemplo';
        font-size: 1.5rem;

      }

      .input-container{
        text-align: center;
        font-size: 2rem;
        display: flex;
        flex-direction: column;
      }

      .input-container input{
        padding: 1rem;
      }

      .input-container, button{
        font-size: 2rem;
      }

      form span{
        font-size: 1.4rem;
        font-weight: bold;
      }

      .erro{
        color: red;
      }

      .sucesso{
        color: green;
      }
    </style>

  </body>

</html>
