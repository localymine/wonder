<?= $this->tag->getDoctype() ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<?= $this->partial('partials/stylesheets') ?>
<!--[if lt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/html5shiv.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/respond.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/excanvas.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?= $this->partial('partials/mainheader') ?>
</header>

<aside class="main-sidebar">

  <?= $this->partial('partials/sidebar') ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?= $this->l10n->_('Manage Users') ?></h1>
    <ol class="breadcrumb">
      <li><?= $this->tag->linkTo(['manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
      <li><?= $this->tag->linkTo(['manager/users/index', $this->l10n->_('Manage Users')]) ?></li>
      <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
    </ol>
  </section>

  <section class="content">
    <?= $this->flash->output() ?>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>
      <?= $this->tag->form(['manager/users/save/' . $user->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

      <?= $this->tag->hiddenField(['id', 'value' => $user->id]) ?>

      <?= $this->tag->hiddenField(['role_id', 'value' => $user->role_id]) ?>

      <div class="box-body">
        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Servicer Name') ?></label>
          <div class="col-xs-12 col-sm-8">
            <?= $this->tag->textField(['name', 'class' => 'form-control', 'value' => $user->name]) ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="servicename" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Service Name') ?></label>
          <div class="col-xs-12 col-sm-8">
            <?= $this->tag->textField(['servicename', 'class' => 'form-control', 'value' => $user->servicename]) ?>

          </div>
        </div>
        <div class="form-group">
          <label for="login" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Login for Servicer') ?></label>
          <div class="col-xs-12 col-sm-4">
            
            <div class="form-control" disabled=""><?= $user->login ?></div>
          </div>
        </div>
        <div class="form-group required">
          <label for="passwd" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Password for Servicer') ?></label>
          <div class="col-xs-12 col-sm-4">
            <?= $this->tag->textField(['passwd', 'class' => 'form-control', 'value' => $user->passwd]) ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="domainname" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Domain Name') ?></label>
          <div class="col-xs-12 col-sm-4">
            <?= $this->tag->textField(['domainname', 'class' => 'form-control', 'value' => $user->domainname]) ?>

          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Has Domain Owner role') ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="hasdomain">
                <?php if ($user->role_id == 1 || $user->role_id == 3) { ?>
                  <?= $this->tag->checkField(['hasdomain', 'name' => 'hasdomain', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Domain Owner') ?>

                <?php } else { ?>
                  <?= $this->tag->checkField(['hasdomain', 'name' => 'hasdomain', 'value' => 1]) ?> <?= $this->l10n->_('Domain Owner') ?>

                <?php } ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group<?php if ($user->role_id == 1 || $user->role_id == 3) { ?> required<?php } ?>">
          <label for="admlogin" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Login for Domain Owner') ?></label>
          <div class="col-xs-12 col-sm-4">
            <?= $this->tag->textField(['admlogin', 'class' => 'form-control', 'value' => $user->admlogin, 'disabled' => (($user->role_id == 1 || $user->role_id == 3) ? '' : true)]) ?>

          </div>
        </div>
        <div class="form-group<?php if ($user->role_id == 1 || $user->role_id == 3) { ?> required<?php } ?>">
          <label for="admpasswd"
                 class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Password for Domain Owner') ?></label>
          <div class="col-xs-12 col-sm-4">
            <?= $this->tag->textField(['admpasswd', 'class' => 'form-control', 'value' => $user->admpasswd, 'disabled' => (($user->role_id == 1 || $user->role_id == 3) ? '' : true)]) ?>

          </div>
        </div>
        <div class="form-group">
          <label for="salestype" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Sales type') ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="radio">
              <?php if ($user->salestype == 1) { ?>
                <label><?= $this->tag->radioField(['salestype_1', 'name' => 'salestype', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Direct seller') ?></label>
              <?php } else { ?>
                <label><?= $this->tag->radioField(['salestype_1', 'name' => 'salestype', 'value' => 1]) ?> <?= $this->l10n->_('Direct seller') ?></label>
              <?php } ?>
            </div>
            <div class="radio required">
              <?php if ($user->salestype == 2) { ?>
                <label><?= $this->tag->radioField(['salestype_2', 'name' => 'salestype', 'value' => 2, 'checked' => true]) ?> <?= $this->l10n->_('Agency(direct)') ?></label>
              <?php } else { ?>
                <label><?= $this->tag->radioField(['salestype_2', 'name' => 'salestype', 'value' => 2]) ?> <?= $this->l10n->_('Agency(direct)') ?></label>
              <?php } ?>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-4">
                <div class="radio">
                  <?php if ($user->salestype == 3) { ?>
                    <label><?= $this->tag->radioField(['salestype_3', 'name' => 'salestype', 'value' => 3, 'checked' => true]) ?> <?= $this->l10n->_('Agency(indirect)') ?></label>
                  <?php } else { ?>
                    <label><?= $this->tag->radioField(['salestype_3', 'name' => 'salestype', 'value' => 3]) ?> <?= $this->l10n->_('Agency(indirect)') ?></label>
                  <?php } ?>
                </div>
              </div>
              <div class="col-xs-6 col-sm-8">
                <div class="radio">
                  <?php if ($user->salestype == 3) { ?>
                    <?php if ($user->paytype == 1) { ?>
                      <label><?= $this->tag->radioField(['paytype_1', 'name' => 'paytype', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->__('Bulk payment', 'User') ?></label>
                    <?php } else { ?>
                      <label><?= $this->tag->radioField(['paytype_1', 'name' => 'paytype', 'value' => 1]) ?> <?= $this->l10n->__('Bulk payment', 'User') ?></label>
                    <?php } ?>
                  <?php } else { ?>
                    <label><?= $this->tag->radioField(['paytype_1', 'name' => 'paytype', 'value' => 1, 'disabled' => true]) ?> <?= $this->l10n->__('Bulk payment', 'User') ?></label>
                  <?php } ?>
                </div>
                <div class="radio">
                  <?php if ($user->salestype == 3) { ?>
                    <?php if ($user->paytype == 2) { ?>
                      <label><?= $this->tag->radioField(['paytype_2', 'name' => 'paytype', 'value' => 2, 'checked' => true]) ?> <?= $this->l10n->__('Monthly payment', 'User') ?></label>
                    <?php } else { ?>
                      <label><?= $this->tag->radioField(['paytype_2', 'name' => 'paytype', 'value' => 2]) ?> <?= $this->l10n->__('Monthly payment', 'User') ?></label>
                    <?php } ?>
                  <?php } else { ?>
                    <label><?= $this->tag->radioField(['paytype_2', 'name' => 'paytype', 'value' => 2, 'disabled' => true]) ?> <?= $this->l10n->__('Monthly payment', 'User') ?></label>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="email1" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Email Address') ?>1</label>
          <div class="col-xs-12 col-sm-8">
            
            <div class="form-control" disabled=""><?= $user->email1 ?></div>
          </div>
        </div>
        <div class="form-group">
          <label for="email2" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Email Address') ?>2</label>
          <div class="col-xs-12 col-sm-8">
            <?= $this->tag->textField(['email2', 'class' => 'form-control', 'value' => $user->email2]) ?>

          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

          <?= $this->tag->linkTo(['manager/users/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

        </div>
      </div>
      <?= $this->tag->endForm() ?>

    </div>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

  <script>
    $(function () {
      $('[name=salestype]').iCheck({
        radioClass: 'iradio_minimal-red'
      }).on('ifChecked', function (evt) {
        $(this).attr('checked', true);
        if ($(this).val() == 3) {
          alert('3-ena')
          $('[name=paytype]').iCheck('enable');
        }
      }).on('ifUnchecked', function (evt) {
        $(this).removeAttr('checked');
        if ($(this).val() == 3) {
          alert('3-dis')
          $('[name=paytype]').iCheck('disable');
        }
      }).iCheck('update');
      $('[name=paytype]').iCheck({
        radioClass: 'iradio_minimal-red'
      }).on('ifChecked', function (evt) {
        $(this).attr('checked', true);
      }).on('ifUnchecked', function (evt) {
        $(this).removeAttr('checked');
      }).iCheck('update');
      $('[name=hasdomain]').iCheck({
        checkboxClass: 'icheckbox_minimal-red'
      }).on('ifChecked', function (evt) {
        $(this).attr('checked', true).val(1);
        $('[name=admlogin], [name=admpasswd]').removeAttr('disabled');
        $('[for=admlogin], [for=admpasswd]').parent().addClass('required');
      }).on('ifUnchecked', function (evt) {
        $(this).removeAttr('checked').val(0);
        $('[name=admlogin], [name=admpasswd]').attr('disabled', 'disabled');
        $('[for=admlogin], [for=admpasswd]').parent().removeClass('required');
      }).iCheck('update');
    });
  </script>

</body>
</html>
