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
    <h1><?php echo $this->l10n->__('Manage Monitors', 'Monitor'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('servicer/monitors/index', $this->l10n->__('Manage Monitors', 'Monitor'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->flash->output(); ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
      </div>
      <?php echo $this->tag->form(array('servicer/monitors/save/' . $monitor->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

      <?php echo $this->tag->hiddenField(array('id', 'value' => $monitor->id)); ?>

      <?php echo $this->tag->hiddenField(array('member_id', 'value' => $monitor->member_id)); ?>

      <?php echo $this->tag->hiddenField(array('group_id', 'value' => $monitor->group_id)); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $monitor->user_id)); ?>

      <?php echo $this->tag->hiddenField(array('uniquekey', 'value' => $monitor->uniquekey)); ?>

      <?php if (!($identity['role_id'] == 1)) { ?>
        <?php echo $this->tag->hiddenField(array('loglevel', 'value' => $monitor->loglevel)); ?>

        <?php echo $this->tag->hiddenField(array('helper', 'value' => $monitor->helper)); ?>

      <?php } ?>
      <div class="box-body">
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">ID</label>
          <div class="col-xs-12 col-sm-2">
            <span class="form-control"><?php echo $monitor->id; ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <span class="form-control"><?php echo $this->escaper->escapeHtml($monitor->group->parent->parent->name); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Area'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <span class="form-control"><?php echo $this->escaper->escapeHtml($monitor->group->parent->name); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Endpoint'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <span class="form-control"><?php echo $this->escaper->escapeHtml($monitor->group->name); ?></span>
          </div>
        </div>
        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Monitor Name', 'Monitor'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'value' => $monitor->name)); ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('HW Address'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('hwaddr', 'class' => 'form-control', 'value' => $monitor->hwaddr)); ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('IP Address(static)'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('ipaddr', 'class' => 'form-control', 'value' => $monitor->ipaddr)); ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Netmask'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('netmask', 'class' => 'form-control', 'value' => $monitor->netmask)); ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="gateway" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Gateway'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('gateway', 'class' => 'form-control', 'value' => $monitor->gateway)); ?>

          </div>
        </div>
        <div class="form-group required">
          <label for="dns1" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('DNS'); ?>1</label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('dns1', 'class' => 'form-control', 'value' => $monitor->dns1)); ?>

          </div>
        </div>
        <div class="form-group">
          <label for="dns2" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('DNS'); ?>2</label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('dns2', 'class' => 'form-control', 'value' => $monitor->dns2)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="firmver" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Firmware Version'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('firmver', 'class' => 'form-control', 'value' => $monitor->firmver)); ?>

          </div>
        </div>
        <div class="form-group">
          <label for="model" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Model Name'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('model', 'class' => 'form-control', 'value' => $monitor->model)); ?>

          </div>
        </div>

        <div class="form-group">
          <label
              class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Monitor Suspend', 'Monitor'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php if ($monitor->disabled == 1) { ?>
                  <?php echo $this->tag->checkField(array('disabled_1', 'name' => 'disabled', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Suspend'); ?>

                <?php } else { ?>
                  <?php echo $this->tag->checkField(array('disabled_0', 'name' => 'disabled', 'value' => 0)); ?> <?php echo $this->l10n->_('Suspend'); ?>

                <?php } ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $monitor->remarks)); ?>

          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('servicer/monitors/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>
      <?php echo $this->tag->endForm(); ?>

    </div>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <?php echo $this->tag->javascriptInclude('js/detection.js'); ?>
  <script>
    $(function () {
      $('[type=checkbox]').iCheck({
        checkboxClass: 'icheckbox_minimal-blue'
      }).on('ifChecked', function (evt) {
        $(this).attr('checked', true).val(1);
      }).on('ifUnchecked', function (evt) {
        $(this).removeAttr('checked').val(0);
      });
      <?php if ($identity['role_id'] == 1) { ?>
      $('[name=helper]').iCheck({
        radioClass: 'iradio_minimal-blue'
      }).on('ifChecked', function (evt) {
        $(this).attr('checked', true);
      }).on('ifUnchecked', function (evt) {
        $(this).removeAttr('checked');
      });
      <?php } ?>
    });
  </script>

</body>
</html>
