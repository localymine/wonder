<?php echo $this->tag->getDoctype(); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?php echo $this->partial('partials/stylesheets'); ?>
<!--[if lt IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/html5shiv.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/respond.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/excanvas.js'); ?>
<![endif]-->
<!--[if gte IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/polyfill.min.js'); ?>
<![endif]-->
<?php echo $this->tag->getTitle(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?php echo $this->partial('partials/mainheader'); ?>
</header>

<aside class="main-sidebar">

  <?php echo $this->partial('partials/sidebar'); ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?php echo $this->l10n->_('Customize'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('servicer/customize/index', $this->l10n->_('Customize'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->escaper->escapeHtml($this->flash->output()); ?>
    <div class="box">

      <?php echo $this->tag->form(array('servicer/customize/index', 'method' => 'post', 'class' => 'form-horizontal form-ex-emails', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

      <?php echo $this->tag->hiddenField(array('execute', 'name' => 'execute', 'value' => 1)); ?>

      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
      </div>

      <div class="box-body">
<?php if ($identity['role_id'] == 1) { ?>
        <div class="form-group required">
          <label for="user_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Servicer'); ?></label>
          <div class="col-xs-12 col-sm-6">
            <?php echo $this->tag->select(array('user_id', $users, 'using' => array('id', 'name'), 'name' => 'user_id', 'class' => 'form-control selectpicker show-tick', 'data-dropup-auto' => 'false', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

          </div>
        </div>
<?php } else { ?>
        <?php echo $this->tag->hiddenField(array('user_id', 'name' => 'user_id', 'value' => $user->id)); ?>

<?php } ?>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Domain name'); ?></label>
          <div class="col-xs-12 col-sm-6">
            <span class="form-control"><?php echo $this->escaper->escapeHtml($user->domainname); ?></span>
          </div>
        </div>

        <div class="form-group required">
          <label for="servicename" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Service Name'); ?></label>
          <div class="col-xs-12 col-sm-6">
            <?php echo $this->tag->textField(array('servicename', 'class' => 'form-control', 'value' => $user->servicename)); ?>

          </div>
        </div>
        <div class="form-group">
          <label for="mainimage" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Main image'); ?></label>
          <div class="col-xs-6 col-sm-3">
            <?php echo $this->tag->fileField(array('mainimage', 'class' => 'form-control', 'value' => $user->mainimage)); ?>
          </div>
          <div class="col-xs-6 col-sm-6">
            <?php if (($user->mainimage != '')) { ?>
              <div>
                <?php echo $this->tag->image(array('servicer/customize/image/' . $user->id . '/2', 'class' => 'img-thumbnail', 'style' => 'max-width:200px')); ?>
                <button type="button" class="btn btn-danger btn-delete btn-xs" data-type="2" data-image="<?php echo $user->mainimage; ?>"><i class="fa fa-close"></i> <?php echo $this->l10n->_('Delete'); ?></button>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <label for="loginimage" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Login image'); ?></label>
          <div class="col-xs-6 col-sm-3">
            <?php echo $this->tag->fileField(array('loginimage', 'class' => 'form-control', 'value' => $user->loginimage)); ?>
          </div>
          <div class="col-xs-6 col-sm-6">
            <?php if (($user->loginimage != '')) { ?>
              <div>
                <?php echo $this->tag->image(array('servicer/customize/image/' . $user->id . '/1', 'class' => 'img-thumbnail', 'style' => 'max-width:200px')); ?>
                <button type="button" class="btn btn-danger btn-delete btn-xs" data-type="1" data-image="<?php echo $user->loginimage; ?>"><i class="fa fa-close"></i> <?php echo $this->l10n->_('Delete'); ?></button>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <label for="themes" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Color themes'); ?></label>
          <div class="col-xs-12 col-sm-9 form-inline themes-bounder">
            <div class="radio">
              <label class="checkbox-inline"><?php echo $this->tag->radioField(array('theme_5', 'name' => 'themes', 'value' => 0, 'checked' => (($user->theme == 0 ? true : null)))); ?>
                <div class="theme-block" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->_('Default theme'); ?>">
                  <div class="theme-default"></div>
                </div>
              </label>
              <label class="checkbox-inline"><?php echo $this->tag->radioField(array('theme_1', 'name' => 'themes', 'value' => 1, 'checked' => (($user->theme == 1 ? true : null)))); ?>
                <div class="theme-block">
                  <div class="theme-dark" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->_('Dark'); ?>"></div>
                </div>
              </label>
              <label class="checkbox-inline"><?php echo $this->tag->radioField(array('theme_2', 'name' => 'themes', 'value' => 2, 'checked' => (($user->theme == 2 ? true : null)))); ?>
                <div class="theme-block">
                  <div class="theme-light" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->_('Light'); ?>"></div>
                </div>
              </label>
              <label class="checkbox-inline"><?php echo $this->tag->radioField(array('theme_3', 'name' => 'themes', 'value' => 3, 'checked' => (($user->theme == 3 ? true : null)))); ?>
                <div class="theme-block">
                  <div class="theme-flower" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->_('flower'); ?>"></div>
                </div>
              </label>
              <label class="checkbox-inline"><?php echo $this->tag->radioField(array('theme_4', 'name' => 'themes', 'value' => 4, 'checked' => (($user->theme == 4 ? true : null)))); ?>
                <div class="theme-block">
                  <div class="theme-high-contrast" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->_('High contrast'); ?>"></div>
                </div>
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="box-footer">
        <div class="action-area">
          <button class="btn btn-primary" filter-handler="submit"><?php echo $this->l10n->_('Save'); ?></button>
        </div>
      </div>
      <?php echo $this->tag->endForm(); ?>

    </div>

  </section>

  <?php echo $this->partial('partials/deleteconfirm'); ?>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

<?php echo $this->tag->javascriptInclude('js/deleteconfirm.js'); ?>
<script>
$(function() {
  $.deleteconfirm({
    modal: '.deleteconfirm-dialog',
    cancelBtn: 'button[filter-handler=cancel]',
    submitBtn: 'button[filter-handler=ok]',
    formOpen : 'button.btn-delete',
    childrenPath:'<?php echo $this->url->get('servicer/customize/delete'); ?>',
    message: '<?php echo $this->l10n->_('The image will be deleted. Are you sure?'); ?>'
  });
  $('[name=themes]').iCheck({
    radioClass:'iradio_minimal-blue'
  }).on('ifChecked', function(evt) {
    $(this).prop('checked', 'checked');
  }).on('ifUnchecked', function(evt) {
    $(this).removeAttr('checked');
  });
<?php if ($identity['role_id'] == 1) { ?>
  $('select[name=user_id]').change(function(evt) {
    $('[name=execute]').val(0);
    $('form').submit();
  });
<?php } ?>
});
</script>

</body>
</html>
