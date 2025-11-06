<?php
include('cabecalho.php');
require('conexao.php');

// Sempre carregar categorias
try{
    $stmt = $pdo->query('SELECT * FROM categoria');
    $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(\Exception $e){
    echo 'Erro ao consultar categorias: '.$e->getMessage();
}

// Carregar produto no GET
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET['id']; // id do produto a ser editado
    try{
        $stmt = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
        $stmt->execute([$id]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$produto) {
            echo "Produto não encontrado";
            exit;
        }
    } catch(Exception $e){
        echo "Erro ao consultar o produto: ".$e->getMessage();
        exit;
    }
}

// Atualizar produto no POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $categoriaId = $_POST['categoria'];
    $id = $_POST['id'];

    try{
       $stmt = $pdo->prepare('UPDATE produto SET descricao = ?, valor = ?, idCategoria = ? WHERE id = ?');
       if($stmt->execute([$descricao, $valor, $categoriaId, $id])){
            header("location: produto.php?editar=true");
            exit;
       } else {
            header("location: produto.php?editar=false");
            exit;
       }
    } catch(Exception $e){
        echo 'Erro ao atualizar: '.$e->getMessage();
    }
}
?>
<h1>Alterar Produto</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição do produto:</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required="" style="height: 110px;"><?= $produto['descricao'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe o valor:</label>
        <input value="<?= $produto['valor'] ?>" type="number" id="valor" name="valor" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Selecione a categoria:</label>
        <select id="categoria" name="categoria" class="form-select" required="">
            <?php foreach ($categoria as $c): ?>    
                <option value="<?= $c['id']?>" <?= $c['id'] == $produto['idCategoria'] ? "selected" : ""?>> <?= $c['nome'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
include('rodape.php');
?>
