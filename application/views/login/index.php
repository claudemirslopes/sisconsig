<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
        <a href="https://tanamesa.com/" title="Acessar o site" target="_blank" class="h1"><img src="<?php echo base_url('public/dist/img/logoSisCadPro.png'); ?>" alt="TNM Logo" class="brand-image swing"  style="border-radius: 1px !important;width: 80%;"></a>
    </div>
    <div class="card-body form-signin">
      <p class="login-box-msg">Bem vindo ao Painel ADM</p>

      <form method="POST" accept-charset="utf-8" class="n" action="<?php echo base_url('login/autentica'); ?>" id="login" name="form_autentica">
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="seuemail@email.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Digite a sua senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
        <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" class="btn btn-block btn-danger">
              <i class="fa fa-unlock mr-2"></i> Acessar
            </button>
        </div>
      <!-- /.social-auth-links -->
      </form>
      
      
    <!--<div class="col-12">-->
        <!-- Mensagem de erro -->
      <?php if ($message = $this->session->flashdata('error')): ?>
      <div class="alert  alert-danger alert-dismissible fade show " role="alert" style="font-size: 0.8em;">
              <span class="badge badge-pill"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
               <?php echo $message; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php endif; ?>
      <!-- Mensagem de erro -->

      <!-- Mensagem de info -->
      <?php if ($message = $this->session->flashdata('info')): ?>
      <div class="alert  alert-warning alert-dismissible fade show " role="alert" style="font-size: 0.8em;">
              <span class="badge badge-pill badge-light"><i class="fa fa-info" aria-hidden="true"></i></span>
               <?php echo $message; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php endif; ?>
      <!-- Mensagem de info -->
    <!--</div>-->
      <p class="mb-1">
        <!--<a href="forgot-password.html">Eu esqueci a minha senha</a>-->
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
