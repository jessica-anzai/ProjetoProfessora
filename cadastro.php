 <?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
    require("conexao.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'],PASSWORD_BCRYPT);

    try{
      $stmt = $pdo->prepare("INSERT INTO usuario(nome,email,senha) values(?,?,?)");
      if($stmt->execute([$nome,$email,$senha])){
      header("location: index.php?cadastro=true;"); exit;
      }
      else header("location: index.php?cadastro=false;"); exit;
    } catch(Exception $e){
      echo "Erro ao executar o comando SQL: " . $e->getMessage();
    }}
  ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #e6f2e6; /* verde clarinho */
    }
    .btn-verde {
      background-color: #28a745;
      color: white;
    }
    .btn-verde:hover {
      background-color: #218838;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="p-4 bg-white rounded shadow" style="width: 320px;" method="post">
      <h2 class="mb-4 text-success">Cadastro</h2>
      <div class="mb-3">
        <label for="nome" class="form-label">Nome completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required />
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Crie uma senha" required />
      </div>
      <button type="submit" class="btn btn-verde w-100 mb-3">Cadastrar</button>
      <div class="text-center">
        <a href="index.php" class="text-success">Já tem conta? Faça login</a>
      </div>
    </form>
  </div>
 
</body>
</html>