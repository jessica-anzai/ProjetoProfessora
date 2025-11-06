<?php
include('cabecalho.php');
require('conexao.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = $_POST['nome'];
    try{
        $stmt = $pdo->prepare('INSERT INTO categoria(nome) VALUES (?)');
        if($stmt->execute([$nome])){
            header('location: categorias.php?cadastro=true');
        }
        else header('location: categoria.php?cadastro=false');
    }catch(\Exception $e){
        echo 'Error: '.$e->getMessage();
    }

}
?>
<h1>Nova Categoria</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome da categoria:</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>

<?php
include('rodape.php');
?>