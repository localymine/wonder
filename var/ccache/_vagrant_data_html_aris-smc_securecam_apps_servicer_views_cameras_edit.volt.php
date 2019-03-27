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
      <h1><?= $this->l10n->_('Manage Cameras') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/cameras/index', $this->l10n->_('Manage Cameras')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['servicer/cameras/save/' . $camera->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['user_id', 'value' => $camera->user_id]) ?>

        <?= $this->tag->hiddenField(['id', 'value' => $camera->id]) ?>

        <?= $this->tag->hiddenField(['member_id', 'value' => $camera->member_id]) ?>

        <?= $this->tag->hiddenField(['group_id', 'value' => $camera->group_id]) ?>

        <div class="box-body">
          <div class="form-group required">
            <label for="course" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Basic Course') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->select(['course', $courses, 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $camera->course]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="bitrate" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Bit rate') ?></label>
            <div class="col-xs-12 col-sm-2">
              <?= $this->tag->select(['bitrate', $bitrates, 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $camera->bitrate]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Preserve') ?></label>
            <div class="col-xs-12 col-sm-2">
              <?= $this->tag->select(['preserve', $preserves, 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $camera->preserve]) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($camera->group->parent->parent->name) ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Area') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($camera->group->parent->name) ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label for="group_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Endpoint') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($camera->group->name) ?></span>
            </div>
          </div>
          <div class="form-group">
            <label for="agentbox_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Agentbox Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['agentbox_id', $agentboxes, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $camera->agentbox_id]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="uniquekey" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Unique id') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['uniquekey', 'class' => 'form-control', 'value' => $camera->uniquekey]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Camera Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control', 'value' => $camera->name]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="discover" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Discover Key') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
<?php if ($camera->discover == 0) { ?>
                <label><?= $this->tag->radioField(['discover_0', 'name' => 'discover', 'value' => 0, 'checked' => true]) ?> <?= $this->l10n->_('IP Address') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['discover_0', 'name' => 'discover', 'value' => 0]) ?> <?= $this->l10n->_('IP Address') ?></label>
<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($camera->discover == 1) { ?>
                <label><?= $this->tag->radioField(['discover_1', 'name' => 'discover', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('HW Address') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['discover_1', 'name' => 'discover', 'value' => 1]) ?> <?= $this->l10n->_('HW Address') ?></label>
<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('IP Address') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['ipaddr', 'class' => 'form-control', 'value' => $camera->ipaddr]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Netmask') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['netmask', 'class' => 'form-control', 'value' => $camera->netmask]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="gateway" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Gateway') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['gateway', 'class' => 'form-control', 'value' => $camera->gateway]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="dns1" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DNS') ?>1</label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['dns1', 'class' => 'form-control', 'value' => $camera->dns1]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="dns2" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DNS') ?>2</label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['dns2', 'class' => 'form-control', 'value' => $camera->dns2]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('HW Address') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['hwaddr', 'class' => 'form-control', 'value' => $camera->hwaddr]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="type" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Type of Camera') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->select(['type', $cameratypes, 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $camera->type]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="manufacturer" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Manufacturer') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['manufacturer', 'class' => 'form-control', 'value' => $camera->manufacturer]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="model" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Model Name') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['model', 'class' => 'form-control', 'value' => $camera->model]) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Recording usage') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="recording">
<?php if ($camera->recording == 1) { ?>
                  <?= $this->tag->checkField(['recording', 'name' => 'recording', 'value' => 1, 'checked' => true, 'disabled' => 'disabled']) ?> <?= $this->l10n->_('Available') ?>

                  <?= $this->tag->hiddenField(['rhidden', 'name' => 'recording', 'value' => 1]) ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['recording', 'name' => 'recording', 'value' => 1]) ?> <?= $this->l10n->_('Available') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Live usage') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="live">
<?php if ($camera->live == 1) { ?>
                  <?= $this->tag->checkField(['live', 'name' => 'live', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Available') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['live', 'name' => 'live', 'value' => 1]) ?> <?= $this->l10n->_('Available') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ usage(Pan, Tilt, and Zoom)') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="ptz">
<?php if ($camera->ptz == 1) { ?>
                  <?= $this->tag->checkField(['ptz', 'name' => 'ptz', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Available') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['ptz', 'name' => 'ptz', 'value' => 1]) ?> <?= $this->l10n->_('Available') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Motion Detection') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="motion">
<?php if ($camera->motion == 1) { ?>
<?php if ($camera->course == 1) { ?>
                  <?= $this->tag->checkField(['motion', 'name' => 'motion', 'value' => 1, 'checked' => true, 'disabled' => 'disabled']) ?> <?= $this->l10n->_('This camera is Motion-detection enabled') ?>

                  <?= $this->tag->hiddenField(['mhidden', 'name' => 'motion', 'value' => 1]) ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['motion', 'name' => 'motion', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('This camera is Motion-detection enabled') ?>

<?php } ?>
<?php } else { ?>
                  <?= $this->tag->checkField(['motion', 'name' => 'motion', 'value' => 1]) ?> <?= $this->l10n->_('This camera is Motion-detection enabled') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Surveil camera') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="surveil">
<?php if ($camera->surveil == 1) { ?>
                  <?= $this->tag->checkField(['surveil', 'name' => 'surveil', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Surveil this Camera') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['surveil', 'name' => 'surveil', 'value' => 1]) ?> <?= $this->l10n->_('Surveil this Camera') ?>

<?php } ?>
                </label>
              </div>
              <div>
                <?= $this->l10n->_('Mail transfer detection') ?>
                <?php if ($camera->surveil == 1) { ?>
                  <?= $this->tag->numericField(['detect_interval', 'class' => 'form-control inline mins-box', 'min' => $detect_interval_default, 'max' => $detect_interval_default_max, 'value' => $camera->detect_interval]) ?>
                <?php } else { ?>
                  <?= $this->tag->numericField(['detect_interval', 'class' => 'form-control inline mins-box', 'disabled' => 'disabled', 'min' => $detect_interval_default, 'max' => $detect_interval_default_max, 'value' => $camera->detect_interval]) ?>
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
<?php if ($camera->disabled == 1) { ?>
                  <?= $this->tag->checkField(['disabled', 'name' => 'disabled', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Suspend') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['disabled', 'name' => 'disabled', 'value' => 1]) ?> <?= $this->l10n->_('Suspend') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Non-billable') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="nocharged">
<?php if ($camera->nocharged == 1) { ?>
                  <?= $this->tag->checkField(['nocharged', 'name' => 'nocharged', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Non-billable') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['nocharged', 'name' => 'nocharged', 'value' => 1]) ?> <?= $this->l10n->_('Non-billable') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="placed" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Placed date') ?></label>
            <div class="col-xs-12 col-sm-4">
              <div class="input-group">
                <?= $this->tag->textField(['placed', 'name' => 'placed', 'class' => 'form-control', 'value' => $camera->placed]) ?>

                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Campaign Option') ?></label>
            <div class="col-xs-12 col-sm-6">
							<?= $this->tag->select(['promotion', $campaigns, 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '0', 'value' => $camera->promotion]) ?>
            </div>
          </div>
          <div class="form-group">
            <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Remarks') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textArea(['remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $camera->remarks]) ?>

            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

            <?= $this->tag->linkTo(['servicer/cameras/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

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
$(function() {
  var ips = $('[name=ipaddr],[name=netmask],[name=gateway],[name=dns1],[name=dns2]');
  var rhidden = $('#rhidden')[0] ? $('#rhidden') :
                $('<input type="hidden">').attr('id', 'rhidden')
                  .attr('value', '1').attr('name', 'recording');
  var mhidden = $('#mhidden')[0] ? $('#mhidden') :
                $('<input type="hidden">').attr('id', 'mhidden')
                  .attr('value', '1').attr('name', 'motion');
  $('[name=discover]').iCheck({
    radioClass:'iradio_minimal-blue'
  }).on('ifChecked', function(evt) {
    $(this).attr('checked', true);
    if ($(this).val() == 1) {
      ips.attr('disabled','disabled');
    } else {
      ips.removeAttr('disabled');
    }
  }).on('ifUnchecked', function(evt) {
    $(this).removeAttr('checked');
  });
  $('input[type=checkbox]').iCheck({
    checkboxClass:'icheckbox_minimal-blue'
  }).on('ifChecked', function(evt) {
    $(this).val(1).attr('checked', 'checked');
    var me = $(this).attr('name');
    if (me === 'promotion') {
      $('label[for=promotion], .constraint').addClass('checked');
      $('[name=recording],'+
        '[name=nocharged]').iCheck('check');
      $('[name=promo_nosurveil]').iCheck('enable');
      $('[name=disabled]').iCheck('uncheck');
    } else if (me === 'surveil') {
      $('[name=promo_nosurveil]').iCheck('uncheck');
    } else if (me === 'promo_nosurveil') {
      $('[name=surveil]').iCheck('uncheck');
    } else if (me === 'nocharged') {
      $('label[for=nocharged]').popover('hide').popover('destroy');
    }
  }).on('ifUnchecked', function(evt) {
    $(this).val(0).removeAttr('checked');
    var me = $(this).attr('name');
    if (me === 'promotion') {
      $('label[for=promotion], .constraint').removeClass('checked');
      $('[name=nocharged]').iCheck('uncheck');
      $('[name=promo_nosurveil]').iCheck('disable');
      $('label[for=nocharged]').popover('hide').popover('destroy');
    } else if (me === 'surveil') {
      $('[name=promo_nosurveil]').iCheck('check');
    } else if (me === 'promo_nosurveil') {
      $('[name=surveil]').iCheck('check');
    } else if (me === 'nocharged') {
      if ($('[name=promotion]').is(':checked')) {
        $('label[for=nocharged]').popover({
          content:'<?= $this->l10n->_('This camera is set as charged manually.') ?>',
          placement:'right',
          container:'body',
          trigger:''
        }).popover('show');
      }
    }
  });
  $('[name=type]').on('change', function(evt) {
    if (this.selectedIndex == 2
    ||  this.selectedIndex == 3
    ||  this.selectedIndex == 4) {
      $('[name=live]').iCheck('check');
    } else {
      $('[name=live]').iCheck('uncheck');
    }
  });
  $('[name=course]').on('change', function(evt) {
    switch(this.selectedIndex) {
      case 0:
        $('[name=recording]').iCheck('enable');
        $('[name=motion]').iCheck('enable');
        rhidden.detach();
        mhidden.detach();
        break;
      case 1:
        $('[name=recording]').iCheck('check').prop('checked', 'checked')
                             .iCheck('disable');
        $('[name=recording]').after(rhidden);
        $('[name=motion]').iCheck('enable');
        mhidden.detach();
        break;
      case 2:
        $('[name=recording]').iCheck('check').prop('checked', 'checked')
                             .iCheck('disable');
        $('[name=recording]').after(rhidden);
        $('[name=motion]').iCheck('check').prop('checked', 'checked')
                          .iCheck('disable');
        $('[name=motion]').after(mhidden);
        break;
      default:
        break;
    }
  });
  $('[name=placed]').datetimepicker({
    format:'Y-MM-DD',
    locale:'ja',
    useCurrent:true,
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
      nextYear: '<?= $this->l10n->_('Next Year') ?>'
    }
  });
<?php if ($camera->discover == 1) { ?>
  ips.attr('disabled', true);
<?php } ?>
<?php if ($camera->promotion == 0) { ?>
  $('[name=promo_nosurveil]').iCheck('disable');
<?php } ?>
});
</script>

</body>
</html>
