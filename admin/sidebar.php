<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Drop Ink</a>
        <div id="close-sidebar">
          <i class="fas fa-arrow-left"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <a href="#"  data-toggle="modal" data-target="#trocarFoto">
          <?php if(empty($foto)){ ?>
            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
          <?php }else{ ?>
            <img class="img-responsive img-rounded" src=" <?php echo $foto; ?> "
            alt="User picture">
          <?php } ?>
          </a>
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php if(empty($nome_estudio)) { echo $nome_tattoo; } else { echo $nome_estudio; } ?></strong>
          </span>
          <span class="user-role"><?php echo $email; ?></span>
          <span class="user-status">
            <i class="fa fa-circle" style="color: #226322;"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li <?php if($paginaLink == "index.php") {echo 'class="active"';}?>>
            <a href="index.php">
              <span>Início</span>
            </a>
          </li>
          <li <?php if($paginaLink == "agenda.php" || $paginaLink == "editar-servico.php") {echo 'class="active"';}?>>
            <a href="agenda.php">
              <span>Agenda</span>
            </a>
          </li>
          <li <?php if($paginaLink == "clientes.php" || $paginaLink == "editar-cliente.php" || $paginaLink == "single-cliente.php") {echo 'class="active"';}?>>
            <a href="clientes.php">
              <span>Clientes</span>
            </a>
          </li>
          <li <?php if($paginaLink == "funcionarios.php" || $paginaLink == "editar-funcionario.php" || $paginaLink == "single-funcionario.php") {echo 'class="active"';}?>>
            <a href="funcionarios.php">
              <span>Funcionários</span>
            </a>
          </li>

          <li <?php if($paginaLink == "estoque.php" || $paginaLink == "kit.php" || $paginaLink == "single-funcionario.php") {echo 'class="active"';}?>>
            <a href="estoque.php">
              <span>Estoque</span>
            </a>
          </li>
          <li <?php if($paginaLink == "financeiro.php") {echo 'class="active"';}?>>
            <a href="financeiro.php">
              <span>Financeiro</span>
            </a>
          </li>
          <li <?php if($paginaLink == "orcamento.php" || $paginaLink == "editar-orcamento.php") {echo 'class="active"';}?>>
            <a href="orcamento.php">
              <span>Orçamentos</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Relatórios</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
      </a>
      <a href="../logout.php">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  
  <!-- Modal -->
<div class="modal fade" id="trocarFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Foto do estudio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="upload.php" enctype="multipart/form-data" method="POST">
          <div class="form-group">  
            <label>Envie a foto do seu estúdio</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*">
          </div>
          <input type="text" name="id" value="<?php  echo $id; ?>" style="display:  none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Nova Foto</button>
      </div>
        </form>
    </div>
  </div>
</div>