<?php 

$email = $_POST["email"];

$destinatario = $email; //Seu e-mail vai aqui

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . "Drop Ink" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Esqueceu sua senha? Sem problemas segue o link para recuperar sua senha:\n"; //Aqui vai o telefone no e-mail
$body = $body . "Link: http://dropink.art.br/nova-senha.php?email=" . $email . "\n";
$body = $body . "===================================" . "\n";

// envia o email
mail($destinatario, 'DropInk - Recuperar Senha' , $body, "From: DropInk!\r\n");

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>
      Drop Ink
    </title>
    <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1" name="viewport">
        <!--===============================================================================================-->
        <link href="images/icons/favicon.ico" rel="icon" type="image/png"/>
        <!--===============================================================================================-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
          <!--===============================================================================================-->
          <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <!--===============================================================================================-->
            <link href="vendor/animate/animate.css" rel="stylesheet" type="text/css">
              <!--===============================================================================================-->
              <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css">
                <!--===============================================================================================-->
                <link href="vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
                  <!--===============================================================================================-->
                  <link href="css/util.css" rel="stylesheet" type="text/css">
                    <link href="css/main.css" rel="stylesheet" type="text/css">
                      <!--===============================================================================================-->
                    </link>
                  </link>
                </link>
              </link>
            </link>
          </link>
        </link>
      </meta>
    </meta>
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt="">
          	<a href="index.html">
            <img alt="IMG" src="img/logo-blackink.png">
            </img>
            </a>
          </div>
          <form action="recuperar.php" class="login100-form validate-form" method="POST">
            <span class="login100-form-title">
              Sucesso! Um link foi enviado para seu e-mail para recuperar sua senha
            </span>
          </form>
        </div>
      </div>
    </div>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js">
    </script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js">
    </script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js">
    </script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js">
    </script>
    <script>
      $('.js-tilt').tilt({
      scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js">
    </script>
  </body>
</html>