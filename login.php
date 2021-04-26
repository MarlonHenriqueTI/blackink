<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Black Ink</title>
  </head>
  <body>
    <section id="meio">
      <div class="container" id="meio-img">
        <a href="index.php">
          <img src="img/logo-blackink-clara.png" alt="logo" class="logo-meio">
        </a>
        <p>É hora do show!</p>
        <form action="fazer-login.php" method="POST" id="formulario-reg-log">
          <div class="form-group">
            <label for="email" id="label-pequeno">E-mail</label>
            <input type="email" class="form-control" id="input-black" name="email" placeholder="email@exemplo.com" required>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno">Senha</label>
            <input type="password" class="form-control" id="input-black" name="senha" placeholder="Escolha uma senha" required>
          </div>
          <div class="row">
            <div class="col">
              <a href="index.php" id="botao-cancelar" class="btn btn-danger">Cancelar</a>
            </div>
            <div class="col">
              <button id="botao-sucesso" class="btn btn-success" type="submit">Entrar</button>
            </div>
          </div>
        </form>
        <a href="construcao.php" id="problemas-link"><p>Problemas com acesso?</p></a>
        <hr id="divisoria-escura">
      </div>
    </section>
    <div id="meio-copy">
      <p>Black Ink Tatoo Manager 2020</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>