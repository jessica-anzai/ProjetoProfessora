<?php
    include('cabecalho.php');
    require('conexao.php');
    try{
        $stmt = $pdo->query("SELECT * FROM categoria");
        $dados = $stmt->fetchAll();

    }catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }
    
    if(isset($_GET['cadastro']) && $_GET['cadastro']){
        echo "<p class='text-success no-print'>Cadastro realizado!</p>";
    }
    else if(isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger no-print'>Erro ao cadastrar!</p>";
    }
    if(isset($_GET['editar']) && $_GET['editar']){
      echo "<p class='text-success no-print'>Edição realizada!</p>";
    }
    else if(isset($_GET['editar']) && !$_GET['editar']){
      echo "<p class='text-danger no-print'>Erro ao editar!</p>";
    }
    if(isset($_GET['excluir']) && $_GET['excluir']){
      echo "<p class='text-success no-print'>Registro excluído!</p>";
    }
    else if(isset($_GET['excluir']) && !$_GET['excluir']){
      echo "<p class='text-danger no-print'>Erro ao excluir!</p>";
    }
?>
        
        <h2>Categorias</h2>
          <a href="nova_categoria.php" class="btn btn-success mb-3 no-print">Novo Registro</a>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th colspan="2">
                  Dados dos produtos
                </th>
                <th class="no-print">
                  <button class="btn btn-secondary" onclick="window.print()">Imprimir</button>
                </th>
              </tr>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    foreach($dados as $d):
                ?>
                <tr>
                  <td><?=$d['id']?></td>
                  <td><?=$d['nome']?></td>
                  <td class="d-flex gap-2">
                    <a href="editar_categoria.php?id=<?= $d['id']?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultar_categoria.php?id=<?= $d['id']?>" class="btn btn-sm btn-info">Consultar</a>
                  </td>
                </tr>
                <?php
                    endforeach;
                ?>

              
            </tbody>
          </table>
        
<?php
    include('rodape.php');
?>