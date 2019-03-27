<?= $this->tag->getDoctype() ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?= $this->partial('partials/stylesheets') ?>
<!--[if lt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/html5shiv.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/respond.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/excanvas.js') ?>
<![endif]-->
<!--[if gt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/polyfill.min.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-blue login-page">


<div class="login-box">
  <div class="login-logo"><?= $this->tag->linkTo(['servicer/main/index', '<b>SMC</b> <small>Login</small>']) ?></div>
  <?= $this->flash->output() ?>
  <div class="login-box-body">
    <p class="login-box-msg"><?= $this->l10n->_('Sign in to start your session') ?></p>
    <?= $this->tag->form(['servicer/sessions/start', 'method' => 'post']) ?>

    <div class="form-group has-feedback">
      <span class="fa fa-user form-control-feedback feedback-left"></span>
      <?= $this->tag->textField(['username', 'class' => 'form-control form-control-left', 'placeholder' => $this->l10n->_('User Name'), 'required' => 'required', 'autofocus' => 'autofocus']) ?>

    </div>
    <div class="form-group has-feedback ">
      <span class="fa fa-lock form-control-feedback feedback-left"></span>
      <?= $this->tag->passwordField(['password', 'class' => 'form-control form-control-left', 'placeholder' => $this->l10n->_('Password'), 'required' => 'required']) ?>

    </div>
    <div class="row">
      <div class="col-xs-6 col-xs-offset-6">
        <button type="submit" class="btn btn-primary btn-block"><?= $this->l10n->_('Sign In') ?></button>
      </div>
    </div>
    <?= $this->tag->endForm() ?>

  </div>
</div>


<?= $this->partial('partials/javascripts') ?>


</body>
</html>
