<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chamado de TI - Formulário</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="./public/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-container">
          <h2 class="mb-4">Envie seu projeto para nossa empresa
          </h2>
          <small>Iremos ajuda-lo o mais rapido possivel! Desde já, agradecemos seu contato.</small>
          <br>
          <form action="" method="POST">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="assunto">Assunto:</label>
              <input type="text" class="form-control" id="assunto" name="assunto" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição do Problema:</label>
              <textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-block">Enviar Chamado</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
