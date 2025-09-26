<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
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
    <form class="p-4 bg-white rounded shadow" style="width: 320px;">
      <h2 class="mb-4 text-success">Acesso ao Sistema</h2>
      <div class="mb-3">
        <label for="emailLogin" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="emailLogin" placeholder="Digite seu e-mail" required />
      </div>
      <div class="mb-3">
        <label for="senhaLogin" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senhaLogin" placeholder="Digite sua senha" required />
      </div>
      <button type="submit" class="btn btn-verde w-100 mb-3">Entrar</button>
      <div class="text-center">
        <a href="cadastro.php" class="text-success">Não tem cadastro? Clique aqui</a>
      </div>
    </form>
  </div>
</body>
</html>