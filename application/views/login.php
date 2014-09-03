<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Canudo's Way - Login</title>
  <link href="<?php echo base_url('application/assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('application/assets/css/style.css');?>" rel="stylesheet" media="screen">
  <script src="<?php echo base_url('application/assets/js/jquery-2.1.1.min.js');?>" ></script>
  <script src="<?php echo base_url('application/assets/js/bootstrap.min.js');?>" ></script>
</head>
<body>

  <div id="container">
    <div class="col-sm-8 centered">
      <h1>Bem vindo ao Canudo's Way!</h1>

      <div id="body">
        <p>Canudo's Way é um aplicativo que possibilita você planejar o melhor caminho para concluir o seu curso da Faculdade Senac.</p>
      </div>
      <div class="col-sm-4 centered">
        <form class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputEmail">E-mail</label>
            <div class="controls">
              <input id="inputEmail" type="text" placeholder="Digite o seu e-mail..." />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Senha</label>
            <div class="controls">
              <input id="inputPassword" type="password" placeholder="Digite a sua senha..." />
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
              <button class="btn" type="submit">Acessar</button>
            </div>
          </div>
        </form>
      </div>
      <p class="footer">Desenvolvido por <strong>Canudo's Way</strong>.</p>
    </div>
  </div>

</body>
</html>
