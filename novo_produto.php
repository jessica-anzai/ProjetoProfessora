<?php
include('cabecalho.php');
require('conexao.php');

// Sempre buscar categorias
try{
    $stmt = $pdo->query('SELECT * FROM categoria');
    $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar as categorias: '.$e->getMessage();
}

// Inserção do produto
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $categoriaId = $_POST['categoria'];
    try{
       $stmt = $pdo->prepare('INSERT INTO produto(descricao,valor,idCategoria) VALUES (?,?,?)');
       if($stmt->execute([$descricao, $valor, $categoriaId])){
            header("location: produto.php?cadastro=true");
            exit;
       } else {
            header("location: produto.php?cadastro=false");
            exit;
       }
    }
    catch (Exception $e){
        echo 'Erro ao inserir: '.$e->getMessage();
    }
}
?>
<h1>Novo Produto</h1>
<form method="post">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição do produto:</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required="" style="height: 110px;"></textarea>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe o valor:</label>
        <input type="number" id="valor" name="valor" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Selecione a categoria:</label>
        <select id="categoria" name="categoria" class="form-select" required="">
            <?php foreach ($categoria as $c): ?>    
                <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
include('rodape.php');
?>
