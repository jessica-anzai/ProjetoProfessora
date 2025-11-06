<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #e6f2e6;
      /* verde clarinho */
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
    <form class="p-4 bg-white rounded shadow" style="width: 320px;" method="POST">
      <?php
      if (isset($_GET['cadastro'])) {
        $cadastro = $_GET['cadastro'];
        if ($cadastro) {
          echo "<p class='text-success'>Cadastro realizado com sucesso</p>";
        } else {
          echo "<p class='text-success'>Erro ao realizar o cadastro!</p>";
        }
      }
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        try {
          $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
          $stmt->execute([$email]);
          $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['acesso'] = true;
            $_SESSION['nome'] = $usuario['nome'];

            header('location: principal.php');
          } else {
            echo "<p class='text-danger'>Credenciais inválidas!!</p>";
          }
        } catch (\Exception $e) {
          echo "Erro: " . $e->getMessage();
        }
      }
      ?>
      <h2 class="mb-4 text-success">Acesso ao Sistema</h2>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required />
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required />
      </div>
      <button type="submit" class="btn btn-verde w-100 mb-3">Entrar</button>
      <div class="text-center">
        <a href="cadastro.php" class="text-success">Não tem cadastro? Clique aqui</a>
      </div>
    </form>
  </div>
</body>

</html>