<?php $this->_macros['customized_img'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
<img src="<?= $this->url->get('main/image/' . $uid . '/' . $type) ?>"><?php } else { ?>
<img src="<?= $this->url->get('img/blank.png') ?>"><?php } ?><?php }; $this->_macros['customized_img'] = \Closure::bind($this->_macros['customized_img'], $this); ?><?php $this->_macros['customized_path'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
<?= $this->url->get('main/image/' . $uid . '/' . $type) ?><?php } else { ?>
<?= $this->url->get('img/blank.png') ?><?php } ?><?php }; $this->_macros['customized_path'] = \Closure::bind($this->_macros['customized_path'], $this); ?>
<?= $this->tag->getDoctype() ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?= $this->partial('partials/stylesheets') ?>
<!--[if lt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/html5shiv.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/respond.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/excanvas.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-blue-light login-page">


<div class="login-box">
  <div class="login-logo">
<?php if (isset($user) && $user->loginimage != '') { ?>
    <?= $this->tag->image([$this->url->get('/main/image/' . $user->id . '/1'), 'alt' => 'logo', 'class' => 'img-responsive']) ?>

<?php } else { ?>
    <?= $this->tag->linkTo(['camviewer/main/index', '<b>SMC</b> <small>Camera Viewer</small>']) ?>

<?php } ?>
  </div>
  <?= $this->flash->output() ?>
  <div class="login-box-body">
    <p class="login-box-msg"><?= $this->l10n->_('Sign in to start your session') ?></p>
    <?= $this->tag->form(['camviewer/sessions/start', 'method' => 'post']) ?>

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
          <button type="submit" class="btn btn-info btn-block"><?= $this->l10n->_('Sign In') ?></button>
        </div>
      </div>
    <?= $this->tag->endForm() ?>

  </div>
</div>


<?= $this->partial('partials/javascripts') ?>


</body>
</html>
