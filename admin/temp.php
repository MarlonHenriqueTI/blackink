        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Contas a vencer</h3>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-sm btn-dark" id="botao-sucesso">Ver Todas</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($contas as $key) {
                    if($key['status'] != 'Pago'){
                      $data_inicial = date('d/m/Y');
                       $data_final = date('d/m/Y', strtotime($key['data']));

                       // Calcula a diferença em segundos entre as datas
                       $diferenca = strtotime($data_final) - strtotime($data_inicial);

                       //Calcula a diferença em dias
                       $dias = floor($diferenca / (60 * 60 * 24));

                    }
                    ?>
                    <?php if($dias <= 5) { ?>
                    <tr>
                      <th scope="row">
                        <?php echo $key['id']; ?>
                      </th>
                      <td>
                        <?php echo "R$".$key['valor']; ?>
                      </td>
                      <td>
                        <?php echo date('d/m/Y', strtotime($key['data'])); ?>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Contas vencidas</h3>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-sm btn-dark" id="botao-sucesso">Ver Todas</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($contas as $key) {
                    if($key['status'] != 'Pago'){
                      $data_inicial = date('d/m/Y');
                       $data_final = date('d/m/Y', strtotime($key['data']));

                       // Calcula a diferença em segundos entre as datas
                       $diferenca = strtotime($data_final) - strtotime($data_inicial);

                       //Calcula a diferença em dias
                       $dias = floor($diferenca / (60 * 60 * 24));

                    }
                    ?>
                    <?php if($dias < 1) { ?>
                    <tr>
                      <th scope="row">
                        <?php echo $key['id']; ?>
                      </th>
                      <td>
                        <?php echo "R$".$key['valor']; ?>
                      </td>
                      <td>
                        <?php echo date('d/m/Y', strtotime($key['data'])); ?>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
            
          </div>
        </div>