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
<!--[if gte IE 9]>
<?= $this->tag->javascriptInclude('js/ie/polyfill.min.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?= $this->partial('partials/mainheader') ?>
</header>

<aside class="main-sidebar">

  <?= $this->partial('partials/sidebar') ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?= $this->l10n->_('Customize') ?></h1>
    <ol class="breadcrumb">
      <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
      <li><?= $this->tag->linkTo(['servicer/customize/index', $this->l10n->_('Customize')]) ?></li>
      <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
    </ol>
  </section>

  <section class="content">
    <?= $this->escaper->escapeHtml($this->flash->output()) ?>
    <div class="box">

      <?= $this->tag->form(['servicer/customize/index', 'method' => 'post', 'class' => 'form-horizontal form-ex-emails', 'role' => 'form', 'enctype' => 'multipart/form-data']) ?>
      <?= $this->tag->hiddenField(['user_id', 'value' => $identity['id']]) ?>
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>

      <div class="box-body">
        <div class="form-group required">
          <label for="servicename" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Service Name') ?></label>
          <div class="col-xs-12 col-sm-9">
            <?= $this->tag->textField(['servicename', 'class' => 'form-control', 'value' => $user->servicename]) ?>

          </div>
        </div>
        <div class="form-group">
          <label for="mainimage" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Main Image') ?></label>
          <div class="col-xs-6 col-sm-3">
            <?= $this->tag->fileField(['mainimage', 'class' => 'form-control', 'value' => $user->mainimage]) ?>
          </div>
          <div class="col-xs-6 col-sm-6">
            <?php if (($user->mainimage != '')) { ?>
              <div>
                <?= $this->tag->image(['servicer/customize/image/' . $identity['id'] . '/2', 'class' => 'img-thumbnail', 'style' => 'max-width:200px']) ?>
                <a href="javascript:void(0)" class="btn btn-danger btn-delete btn-xs" data-type="2" data-image="<?= $user->mainimage ?>"><i class="fa fa-close"></i></a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <label for="loginimage" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Login Image') ?></label>
          <div class="col-xs-6 col-sm-3">
            <?= $this->tag->fileField(['loginimage', 'class' => 'form-control', 'value' => $user->loginimage]) ?>
          </div>
          <div class="col-xs-6 col-sm-6">
            <?php if (($user->loginimage != '')) { ?>
              <div>
                <?= $this->tag->image(['servicer/customize/image/' . $identity['id'] . '/1', 'class' => 'img-thumbnail', 'style' => 'max-width:200px']) ?>
                <a href="javascript:void(0)" class="btn btn-danger btn-delete btn-xs" data-type="1" data-image="<?= $user->loginimage ?>"><i class="fa fa-close"></i></a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <label for="themes" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Color Themes') ?></label>
          <div class="col-xs-12 col-sm-9 form-inline themes-bounder">
            <div class="radio">
              <label class="checkbox-inline"><?= $this->tag->radioField(['theme_5', 'name' => 'themes', 'value' => 0, 'checked' => (($user->theme == 0 ? true : null))]) ?> <div class="theme-block"><div class="theme-default"></div></div></label>
              <label class="checkbox-inline"><?= $this->tag->radioField(['theme_1', 'name' => 'themes', 'value' => 1, 'checked' => (($user->theme == 1 ? true : null))]) ?> <div class="theme-block"><div class="theme-dark"></div></div></label>
              <label class="checkbox-inline"><?= $this->tag->radioField(['theme_2', 'name' => 'themes', 'value' => 2, 'checked' => (($user->theme == 2 ? true : null))]) ?> <div class="theme-block"><div class="theme-light"></div></div></label>
              <label class="checkbox-inline"><?= $this->tag->radioField(['theme_3', 'name' => 'themes', 'value' => 3, 'checked' => (($user->theme == 3 ? true : null))]) ?> <div class="theme-block"><div class="theme-flower"></div></div></label>
              <label class="checkbox-inline"><?= $this->tag->radioField(['theme_4', 'name' => 'themes', 'value' => 4, 'checked' => (($user->theme == 4 ? true : null))]) ?> <div class="theme-block"><div class="theme-high-contrast"></div></div></label>
            </div>
          </div>
        </div>
      </div>

      <div class="box-footer">
        <div class="col-xs-12 align-center">
          <button class="btn btn-primary" filter-handler="submit"><i class="fa fa-square-o fa-lg"></i> <?= $this->l10n->_('Submit') ?></button>
        </div>
      </div>
      <?= $this->tag->endForm() ?>

    </div>

  </section>

  <?= $this->partial('partials/deleteconfirm') ?>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

  <?= $this->tag->javascriptInclude('js/deleteconfirm.js') ?>
  <script>
    $(function () {
      $.deleteconfirm({
        modal: '.deleteconfirm-dialog',
        cancelBtn: 'button[filter-handler=cancel]',
        submitBtn: 'button[filter-handler=ok]',
        formOpen : 'a.btn-delete',
        childrenPath:'<?= $this->url->get('servicer/customize/delete') ?>',
        message: '<?= $this->l10n->_('Do you want to delete this image?') ?>'
      });
    });
  </script>

</body>
</html>
