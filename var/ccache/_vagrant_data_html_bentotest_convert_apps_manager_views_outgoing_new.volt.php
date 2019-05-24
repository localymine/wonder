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
    <h1><?php echo $this->l10n->_('Manage Outgoing'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/outgoing/index', $this->l10n->_('Manage Outgoing'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->flash->output(); ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
      </div>
      <?php echo $this->tag->form(array('manager/outgoing/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

      <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

      <div class="box-body">
        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Name'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="member_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Responsible Person'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('member_id', $members, 'using' => array('id', 'name'), 'name' => 'member_id', 'class' => 'form-control show-tick', 'data-style' => 'btn-white', 'useEmpty' => true)); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="type_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Type'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('type_id', $types, 'using' => array('id', 'name'), 'name' => 'type_id', 'class' => 'form-control show-tick', 'data-style' => 'btn-white', 'useEmpty' => true)); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="amount" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Amount'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              <?php echo $this->tag->textField(array('amount', 'class' => 'form-control')); ?>
              <span class="input-group-addon">&#8363;</span>
            </div>

          </div>
        </div>

        <div class="form-group">
          <label for="exec_date" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Execute Date'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              <?php echo $this->tag->textField(array('exec_date', 'class' => 'form-control date-chooser')); ?>

              <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3')); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

              </label>
            </div>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/outgoing/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

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

      $('[name=exec_date]').datetimepicker({
        format:'Y-MM-DD HH:mm',
        locale:'en',
        useCurrent:true,
        dayViewHeaderFormat:'<?php echo $this->l10n->_('MMM YYYY'); ?>',
        tooltips: {
          today: '<?php echo $this->l10n->_('Select Today'); ?>',
          clear: '<?php echo $this->l10n->_('Deselect'); ?>',
          close: '<?php echo $this->l10n->_('Close'); ?>',
          selectMonth: '<?php echo $this->l10n->_('Select Month'); ?>',
          prevMonth: '<?php echo $this->l10n->_('Previous Month'); ?>',
          nextMonth: '<?php echo $this->l10n->_('Next Month'); ?>',
          selectYear: '<?php echo $this->l10n->_('Select Year'); ?>',
          prevYear: '<?php echo $this->l10n->_('Previous Year'); ?>',
          nextYear: '<?php echo $this->l10n->_('Next Year'); ?>',
          selectTime: '<?php echo $this->l10n->_('Select Time'); ?>'
        }
      });
    });
  </script>

</body>
</html>
