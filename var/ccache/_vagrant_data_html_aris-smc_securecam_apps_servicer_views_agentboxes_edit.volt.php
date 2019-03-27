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
      <h1><?= $this->l10n->_('Manage Agentboxes') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/agentboxes/index', $this->l10n->_('Manage Agentboxes')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['servicer/agentboxes/save/' . $agentbox->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['id', 'value' => $agentbox->id]) ?>

        <?= $this->tag->hiddenField(['member_id', 'value' => $agentbox->member_id]) ?>

        <?= $this->tag->hiddenField(['group_id', 'value' => $agentbox->group_id]) ?>

        <?= $this->tag->hiddenField(['user_id', 'value' => $agentbox->user_id]) ?>

        <?= $this->tag->hiddenField(['uniquekey', 'value' => $agentbox->uniquekey]) ?>

        <?= $this->tag->hiddenField(['ntpdate', 'value' => $agentbox->ntpdate]) ?>

        <?= $this->tag->hiddenField(['forcetc', 'value' => $agentbox->forcetc]) ?>

        <?= $this->tag->hiddenField(['autotc', 'value' => $agentbox->autotc]) ?>

        <?= $this->tag->hiddenField(['memtype', 'value' => $agentbox->memtype]) ?>

<?php if (!($identity['role_id'] == 1)) { ?>
        <?= $this->tag->hiddenField(['loglevel', 'value' => $agentbox->loglevel]) ?>

        <?= $this->tag->hiddenField(['helper', 'value' => $agentbox->helper]) ?>

<?php } ?>
        <div class="box-body">
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label">ID</label>
            <div class="col-xs-12 col-sm-2">
              <span class="form-control"><?= $agentbox->id ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($agentbox->group->parent->parent->name) ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Area') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($agentbox->group->parent->name) ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Endpoint') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($agentbox->group->name) ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Agentbox Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control', 'value' => $agentbox->name]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('HW Address') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['hwaddr', 'class' => 'form-control', 'value' => $agentbox->hwaddr]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('IP Address(static)') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['ipaddr', 'class' => 'form-control', 'value' => $agentbox->ipaddr]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Netmask') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['netmask', 'class' => 'form-control', 'value' => $agentbox->netmask]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="gateway" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Gateway') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['gateway', 'class' => 'form-control', 'value' => $agentbox->gateway]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="dns1" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DNS') ?>1</label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['dns1', 'class' => 'form-control', 'value' => $agentbox->dns1]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="dns2" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DNS') ?>2</label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['dns2', 'class' => 'form-control', 'value' => $agentbox->dns2]) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Surveil agentbox') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="surveil">
<?php if ($agentbox->surveil == 1) { ?>
                  <?= $this->tag->checkField(['surveil', 'name' => 'surveil', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Surveil this Agentbox') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['surveil', 'name' => 'surveil', 'value' => 1]) ?> <?= $this->l10n->_('Surveil this Agentbox') ?>

<?php } ?>
                </label>
              </div>
              <div>
                <?= $this->l10n->_('Mail transfer detection') ?>
                <?php if ($agentbox->surveil == 1) { ?>
                  <?= $this->tag->numericField(['detect_interval', 'class' => 'form-control inline mins-box', 'min' => $detect_interval_default, 'max' => $detect_interval_default_max, 'value' => $agentbox->detect_interval]) ?>
                <?php } else { ?>
                  <?= $this->tag->numericField(['detect_interval', 'class' => 'form-control inline mins-box', 'disabled' => 'disabled', 'min' => $detect_interval_default, 'max' => $detect_interval_default_max, 'value' => $agentbox->detect_interval]) ?>
                <?php } ?>
                <?= $this->l10n->_('mins') ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Temporarily suspend agent process on the server') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="disabled">
<?php if ($agentbox->disabled == 1) { ?>
                  <?= $this->tag->checkField(['disabled_1', 'name' => 'disabled', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Suspend') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['disabled_0', 'name' => 'disabled', 'value' => 0]) ?> <?= $this->l10n->_('Suspend') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>

<?php if ($identity['role_id'] == 1) { ?>
          <div class="form-group">
            <label for="helper" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('SSH Helper') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
<?php if ($agentbox->helper == 0) { ?>
                <label><?= $this->tag->radioField(['helper_0', 'name' => 'helper', 'value' => 0, 'checked' => true]) ?> <?= $this->l10n->_('Disable always') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['helper_0', 'name' => 'helper', 'value' => 0]) ?> <?= $this->l10n->_('Disable always') ?></label>
<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($agentbox->helper == 1) { ?>
                <label><?= $this->tag->radioField(['helper_1', 'name' => 'helper', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Enable always') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['helper_1', 'name' => 'helper', 'value' => 1]) ?> <?= $this->l10n->_('Enable always') ?></label>
<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($agentbox->helper == 2) { ?>
                <label><?= $this->tag->radioField(['helper_2', 'name' => 'helper', 'value' => 2, 'checked' => true]) ?> <?= $this->l10n->_('Watch process and shared memory cache') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['helper_2', 'name' => 'helper', 'value' => 2]) ?> <?= $this->l10n->_('Watch process and shared memory cache') ?></label>
<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="loglevel" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Log Level') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->select(['loglevel', $loglevels, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => false]) ?>

            </div>
          </div>
<?php } ?>
          <div class="form-group">
            <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Remarks') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textArea(['remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $agentbox->remarks]) ?>

            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

            <?= $this->tag->linkTo(['servicer/agentboxes/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

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

  <?= $this->tag->javascriptInclude('js/detection.js') ?>
<script>
  $(function(){
    $('[type=checkbox]').iCheck({
      checkboxClass:'icheckbox_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked',true).val(1);
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked').val(0);
    });
<?php if ($identity['role_id'] == 1) { ?>
    $('[name=helper]').iCheck({
      radioClass:'iradio_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked', true);
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked');
    });
<?php } ?>
  });
</script>

</body>
</html>
