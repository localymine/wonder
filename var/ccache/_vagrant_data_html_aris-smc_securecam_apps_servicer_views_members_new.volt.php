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
      <h1><?= $this->l10n->_('Manage Members') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/members/index', $this->l10n->_('Manage Members')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['servicer/members/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['user_id', 'value' => $identity['id']]) ?>

        <?= $this->tag->hiddenField(['disabled', 'value' => 0]) ?>

        <div class="box-body">

          <div class="form-group">
            <label for="membergroup_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Membergroup') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['membergroup_id', $mgroups, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('NO group'), 'emptyValue' => '']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Member Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-6 col-sm-3 control-label"><?= $this->l10n->_('Customer #') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="row">
                <div class="col-xs-6 col-sm-6">
                  <label for="ccode" class="control-label"><?= $this->l10n->_('company:') ?></label>
                  <?= $this->tag->textField(['ccode', 'class' => 'form-control']) ?>

                </div>
                <div class="col-xs-6 col-sm-6">
                  <label for="ocode" class="control-label"><?= $this->l10n->_('branch:') ?></label>
                  <?= $this->tag->textField(['ocode', 'class' => 'form-control']) ?>

                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="mcode" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Contract #') ?></label>
            <div class="col-xs-6 col-sm-4">
              <?= $this->tag->textField(['mcode', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="sales" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Sales type') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php foreach ($salestypes as $s) { ?><?php if ($s->value == $identity['salestype']) { ?><?= $this->escaper->escapeHtml($s->name) ?><?php } ?><?php } ?></span>
              <?= $this->tag->hiddenField(['sales', 'name' => 'sales', 'value' => $identity['salestype']]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Payment type') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
<?php if ($paymethod == 1) { ?>
                <label><?= $this->tag->radioField(['paymethod_1', 'name' => 'paymethod', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->__('Bulk payment', 'Member') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['paymethod_1', 'name' => 'paymethod', 'value' => 1]) ?> <?= $this->l10n->__('Bulk payment', 'Member') ?></label>
<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($paymethod == 2) { ?>
                <label><?= $this->tag->radioField(['paymethod_2', 'name' => 'paymethod', 'value' => 2, 'checked' => true]) ?> <?= $this->l10n->__('Monthly payment', 'Member') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['paymethod_2', 'name' => 'paymethod', 'value' => 2]) ?> <?= $this->l10n->__('Monthly payment', 'Member') ?></label>
<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DRM Optional usage') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
                <label><?= $this->tag->radioField(['usedrm_1', 'name' => 'usedrm', 'value' => 1]) ?> <?= $this->l10n->__('Yes', 'DRM') ?></label>
              </div>
              <div class="radio-inline">
                <label><?= $this->tag->radioField(['usedrm_0', 'name' => 'usedrm', 'value' => 0, 'checked' => true]) ?> <?= $this->l10n->__('No', 'DRM') ?></label>
              </div>
            </div>
          </div>
          <div class="form-group required">
            <label for="joined" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Subscribed') ?></label>
            <div class="col-xs-12 col-sm-4">
              <div class="input-group">
                <?= $this->tag->textField(['joined', 'class' => 'form-control', 'value' => date('Y-m-d 00:00:00')]) ?>

                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="joined" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Person Name in charge') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['parsonname', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Email Address') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['email', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Phone') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['phone', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Remarks') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textArea(['remarks', 'class' => 'form-control', 'rows' => '3']) ?>

            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

            <?= $this->tag->linkTo(['servicer/members/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

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
      dayViewHeaderFormat:'<?= $this->l10n->_('MMM YYYY') ?>',
      tooltips: {
        today: '<?= $this->l10n->_('Select Today') ?>',
        clear: '<?= $this->l10n->_('Deselect') ?>',
        close: '<?= $this->l10n->_('Close') ?>',
        selectMonth: '<?= $this->l10n->_('Select Month') ?>',
        prevMonth: '<?= $this->l10n->_('Previous Month') ?>',
        nextMonth: '<?= $this->l10n->_('Next Month') ?>',
        selectYear: '<?= $this->l10n->_('Select Year') ?>',
        prevYear: '<?= $this->l10n->_('Previous Year') ?>',
        nextYear: '<?= $this->l10n->_('Next Year') ?>',
        selectTime: '<?= $this->l10n->_('Select Time') ?>'
      }
    }).datetimepicker('update');
  });
</script>

</body>
</html>
