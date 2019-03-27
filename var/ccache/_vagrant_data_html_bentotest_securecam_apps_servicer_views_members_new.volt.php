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
      <h1><?php echo $this->l10n->_('Manage Members'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/members/index', $this->l10n->_('Manage Members'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <?php echo $this->tag->form(array('servicer/members/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

        <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

        <?php echo $this->tag->hiddenField(array('disabled', 'value' => 0)); ?>

        <div class="box-body">

          <div class="form-group">
            <label for="membergroup_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Membergroup'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->select(array('membergroup_id', $mgroups, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('NO group'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Member Name'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-6 col-sm-3 control-label"><?php echo $this->l10n->_('Customer #'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="row">
                <div class="col-xs-6 col-sm-6">
                  <label for="ccode" class="control-label"><?php echo $this->l10n->_('company:'); ?></label>
                  <?php echo $this->tag->textField(array('ccode', 'class' => 'form-control')); ?>

                </div>
                <div class="col-xs-6 col-sm-6">
                  <label for="ocode" class="control-label"><?php echo $this->l10n->_('branch:'); ?></label>
                  <?php echo $this->tag->textField(array('ocode', 'class' => 'form-control')); ?>

                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="mcode" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Contract #'); ?></label>
            <div class="col-xs-6 col-sm-4">
              <?php echo $this->tag->textField(array('mcode', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="sales" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Sales type'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php foreach ($salestypes as $s) { ?><?php if ($s->value == $identity['salestype']) { ?><?php echo $this->escaper->escapeHtml($s->name); ?><?php } ?><?php } ?></span>
              <?php echo $this->tag->hiddenField(array('sales', 'name' => 'sales', 'value' => $identity['salestype'])); ?>

            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Payment type'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
<?php if ($paymethod == 1) { ?>
                <label><?php echo $this->tag->radioField(array('paymethod_1', 'name' => 'paymethod', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->__('Bulk payment', 'Member'); ?></label>
<?php } else { ?>
                <label><?php echo $this->tag->radioField(array('paymethod_1', 'name' => 'paymethod', 'value' => 1)); ?> <?php echo $this->l10n->__('Bulk payment', 'Member'); ?></label>
<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($paymethod == 2) { ?>
                <label><?php echo $this->tag->radioField(array('paymethod_2', 'name' => 'paymethod', 'value' => 2, 'checked' => true)); ?> <?php echo $this->l10n->__('Monthly payment', 'Member'); ?></label>
<?php } else { ?>
                <label><?php echo $this->tag->radioField(array('paymethod_2', 'name' => 'paymethod', 'value' => 2)); ?> <?php echo $this->l10n->__('Monthly payment', 'Member'); ?></label>
<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('DRM Optional usage'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
                <label><?php echo $this->tag->radioField(array('usedrm_1', 'name' => 'usedrm', 'value' => 1)); ?> <?php echo $this->l10n->__('Yes', 'DRM'); ?></label>
              </div>
              <div class="radio-inline">
                <label><?php echo $this->tag->radioField(array('usedrm_0', 'name' => 'usedrm', 'value' => 0, 'checked' => true)); ?> <?php echo $this->l10n->__('No', 'DRM'); ?></label>
              </div>
            </div>
          </div>
          <div class="form-group required">
            <label for="joined" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Subscribed'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <div class="input-group">
                <?php echo $this->tag->textField(array('joined', 'class' => 'form-control', 'value' => date('Y-m-d 00:00:00'))); ?>

                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="joined" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Person Name in charge'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('parsonname', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Email Address'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('email', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Phone'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('phone', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3')); ?>

            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

            <?php echo $this->tag->linkTo(array('servicer/members/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

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

<script>
  $(function(){
    $('[name=usedrm],[name=paymethod]').iCheck({
      radioClass:'iradio_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked',true);
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked');
    });
    $('[name=joined]').datetimepicker({
      useCurrent:true,
      locale:'ja',
      format:'Y-MM-DD HH:mm:ss',
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
    }).datetimepicker('update');
  });
</script>

</body>
</html>
