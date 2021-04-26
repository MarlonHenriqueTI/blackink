<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>
      Treina + Login do Administrador
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
            <img alt="IMG" src="images/img-01.png">
            </img>
          </div>
          <form action="recuperar.php" class="login100-form validate-form" method="POST">
            <span class="login100-form-title">
              Digite Seu E-mail Para Recuperar Sua Senha
            </span>
            <div class="wrap-input100 validate-input" data-validate="Digite um e-mail valido: ex@abc.xyz">
              <input class="input100" name="email" placeholder="E-mail" type="text">
                <span class="focus-input100">
                </span>
                <span class="symbol-input100">
                  <i aria-hidden="true" class="fa fa-envelope">
                  </i>
                </span>
              </input>
            </div>
            <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                Recuperar Senha
              </button>
            </div>
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