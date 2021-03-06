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

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

<div class="wrapper">

<header class="main-header">
<?php echo $this->partial('partials/mainheader'); ?>
</header>

<aside class="main-sidebar">

  <?php echo $this->partial('partials/sidebar'); ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?php echo $this->l10n->_('Manage Clients'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/members/index', $this->l10n->_('Manage Clients'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->flash->output(); ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
      </div>
      <?php echo $this->tag->form(array('manager/members/save', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $member->user_id)); ?>

      <?php echo $this->tag->hiddenField(array('id', 'value' => $member->id)); ?>

      <div class="box-body">
        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Name'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'value' => $member->name)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Email'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('email', 'class' => 'form-control', 'value' => $member->email)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Phone'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->textField(array('phone', 'class' => 'form-control', 'value' => $member->phone)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="login" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Login'); ?></label>
          <div class="col-xs-12 col-sm-2">
            <?php echo $this->tag->textField(array('login', 'class' => 'form-control', 'value' => $member->login)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="password" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Password'); ?></label>
          <div class="col-xs-12 col-sm-2">
            <?php echo $this->tag->textField(array('password', 'class' => 'form-control', 'value' => $member->password)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $member->remarks)); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php if ($member->disabled == 1) { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } else { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } ?>

              </label>
            </div>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/members/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>
      <?php echo $this->tag->endForm(); ?>

    </div>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });
    });
  </script>

</body>
</html>
