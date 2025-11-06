<?php
    require("cabecalho.php");
    require("conexao.php");

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        try {
            $stmt = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao consultar categoria: " . $e->getMessage();
        }
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        try{
            $stmt = 
                $pdo->prepare("DELETE from produto WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: produto.php?excluir=true');
            } else {
                header('location: produto.php?excluir=false');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

    <h1>Consultar Produto</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <div class="mb-3">
            <label for="descricao" class="form-label">Nome do produto:</label>
            <input disabled value="<?= $produto['descricao'] ?>" type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Preço do produto:</label>
            <input disabled value="<?= $produto['valor'] ?>" type="number" id="valor" name="valor" class="form-control" required="">        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria do produto:</label>
            <input disabled value="<?= $produto['idCategoria'] ?>" type="text" id="categoria" name="categoria" class="form-control" required="">
        </div>
        <p>Deseja excluir esse registro?</p>
        <button type="submit" class="btn btn-danger">Excluir</button>
        <button onclick="history.back();" type="button" class="btn btn-secondary">
            Voltar
        </button>
    </form>

<?php
    require("rodape.php");
?>