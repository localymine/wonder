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
      <h1><?php echo $this->l10n->_('Manage Cameras'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/cameras/index', $this->l10n->_('Manage Cameras'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <?php echo $this->tag->form(array('servicer/cameras/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

        <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

        <?php echo $this->tag->hiddenField(array('member_id', 'value' => $member->id)); ?>

        <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

        <div class="box-body">
          <div class="form-group required">
            <label for="course" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Basic Course'); ?></label>
            <div class="col-xs-12 col-sm-3">
              <?php echo $this->tag->select(array('course', $courses, 'using' => array('value', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="bitrate" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Bit rate'); ?></label>
            <div class="col-xs-12 col-sm-2">
              <?php echo $this->tag->select(array('bitrate', $bitrates, 'using' => array('value', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Preserve'); ?></label>
            <div class="col-xs-12 col-sm-2">
              <?php echo $this->tag->select(array('preserve', $preserves, 'using' => array('value', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($group)) { ?>
              <span class="form-control"><?php echo $this->escaper->escapeHtml($group->parent->parent->name); ?></span>
<?php } else { ?>
              <span class="form-control"><?php echo $this->escaper->escapeHtml($layer1->name); ?></span>
<?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Area'); ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($group)) { ?>
              <span class="form-control"><?php echo $this->escaper->escapeHtml($group->parent->name); ?></span>
<?php } else { ?>
              <?php echo $this->tag->select(array('layer2', $layer2, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

<?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="group_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Endpoint'); ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($group)) { ?>
              <span class="form-control"><?php echo $this->escaper->escapeHtml($group->name); ?></span>
              <?php echo $this->tag->hiddenField(array('group_id', 'value' => $group->id)); ?>

<?php } else { ?>
              <?php echo $this->tag->select(array('group_id', $layer3, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

<?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label for="agentbox_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Agentbox Name'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->select(array('agentbox_id', $agentboxes, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="uniquekey" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Unique id'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('uniquekey', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Camera Name'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="discover" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Discover Key'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
<?php if ($discover == 0) { ?>
                <label><?php echo $this->tag->radioField(array('discover_0', 'name' => 'discover', 'value' => 0, 'checked' => true)); ?> <?php echo $this->l10n->_('IP Address'); ?></label>
<?php } else { ?>
                <label><?php echo $this->tag->radioField(array('discover_0', 'name' => 'discover', 'value' => 0)); ?> <?php echo $this->l10n->_('IP Address'); ?></label>
<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($discover == 1) { ?>
                <label><?php echo $this->tag->radioField(array('discover_1', 'name' => 'discover', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('HW Address'); ?></label>
<?php } else { ?>
                <label><?php echo $this->tag->radioField(array('discover_1', 'name' => 'discover', 'value' => 1)); ?> <?php echo $this->l10n->_('HW Address'); ?></label>
<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('IP Address'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('ipaddr', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Netmask'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('netmask', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="gateway" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Gateway'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('gateway', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="dns1" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('DNS'); ?>1</label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('dns1', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="dns2" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('DNS'); ?>2</label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('dns2', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('HW Address'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('hwaddr', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="type" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Type of Camera'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->select(array('type', $cameratypes, 'using' => array('value', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="manufacturer" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Manufacturer'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('manufacturer', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="model" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Model Name'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('model', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Recording usage'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="recording">
<?php if ($recording == 1) { ?>
                  <?php echo $this->tag->checkField(array('recording', 'name' => 'recording', 'value' => 1, 'checked' => true, 'disabled' => 'disabled')); ?> <?php echo $this->l10n->_('Available'); ?>

                  <?php echo $this->tag->hiddenField(array('rhidden', 'name' => 'recording', 'value' => 1)); ?>

<?php } else { ?>
                  <?php echo $this->tag->checkField(array('recording', 'name' => 'recording', 'value' => 1)); ?> <?php echo $this->l10n->_('Available'); ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Live usage'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="live">
                  <?php echo $this->tag->checkField(array('live', 'value' => 1)); ?> <?php echo $this->l10n->_('Available'); ?>

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('PTZ usage(Pan, Tilt, and Zoom)'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="ptz">
                  <?php echo $this->tag->checkField(array('ptz', 'value' => 1)); ?> <?php echo $this->l10n->_('Available'); ?>

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Motion Detection'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="motion">
<?php if (isset($motion) && $motion == 1) { ?>
<?php if ($course == 1) { ?>
                  <?php echo $this->tag->checkField(array('motion', 'name' => 'motion', 'value' => 1, 'checked' => true, 'disabled' => 'disabled')); ?> <?php echo $this->l10n->_('This camera is Motion-detection enabled'); ?>

                  <?php echo $this->tag->hiddenField(array('mhidden', 'name' => 'motion', 'value' => 1)); ?>

<?php } else { ?>
                  <?php echo $this->tag->checkField(array('motion', 'name' => 'motion', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('This camera is Motion-detection enabled'); ?>

<?php } ?>
<?php } else { ?>
                  <?php echo $this->tag->checkField(array('motion', 'name' => 'motion', 'value' => 1)); ?> <?php echo $this->l10n->_('This camera is Motion-detection enabled'); ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Surveil camera'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="surveil">
                  <?php echo $this->tag->checkField(array('surveil', 'value' => 1)); ?> <?php echo $this->l10n->_('Surveil this Camera'); ?>

                </label>
              </div>
              <div>
                <?php echo $this->tag->setDefault('detect_interval', (isset($pdetect_interval) ? $pdetect_interval : $detect_interval_default)); ?>
                <?php echo $this->l10n->_('Mail transfer detection'); ?>
                <?php if (isset($psurveil)) { ?>
                  <?php echo $this->tag->numericField(array('detect_interval', 'class' => 'form-control inline mins-box', 'min' => $detect_interval_default, 'max' => $detect_interval_default_max)); ?>
                <?php } else { ?>
                  <?php echo $this->tag->numericField(array('detect_interval', 'class' => 'form-control inline mins-box', 'disabled' => 'disabled', 'min' => $detect_interval_default, 'max' => $detect_interval_default_max)); ?>
                <?php } ?>
                <?php echo $this->l10n->_('mins'); ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Temporarily suspend agent process on the server'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="disabled">
                  <?php echo $this->tag->checkField(array('disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Suspend'); ?>

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Non-billable'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="nocharged">
                  <?php echo $this->tag->checkField(array('nocharged', 'value' => 1)); ?> <?php echo $this->l10n->_('Non-billable'); ?>

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="placed" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Placed date'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <div class="input-group">
                <?php echo $this->tag->textField(array('placed', 'class' => 'form-control')); ?>

                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Campaign Option'); ?></label>
            <div class="col-xs-12 col-sm-6">
							<?php echo $this->tag->select(array('promotion', $campaigns, 'using' => array('value', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '0')); ?>
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

            <?php echo $this->tag->linkTo(array('servicer/cameras/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

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
$(function() {
  var dyn_selects = {
    layer2:{
      url:'<?php echo $this->url->get('servicer/groups/getchildren'); ?>',
      tgt:'group_id',
      caller:2
    },
    group_id:{
      url:'<?php echo $this->url->get('servicer/agentboxes/getchildren'); ?>',
      tgt:'agentbox_id',
      caller:3
    }
  };
  $('[name=layer2],[name=group_id]').on('change', function(evt) {
    var token = $('#csrf').val();
    var elem  = $(this).attr('name');
    var caller_id = parseInt($(this).val());
    var post_data = {
      member_id:<?php echo $member->id; ?>,
      caller:dyn_selects[elem].caller,
      csrf:token
    };
    if (!isNaN(caller_id)) {
      post_data.caller_id = caller_id;
    }
    $.ajax({
      url:dyn_selects[elem].url,
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false,
    }).done(function(data /*, status, xhr*/) {
      /**
       * @type {Object} data
       * @property {Array} opt
       * @property {Array} csrf
       */
      if (typeof data === 'object') {
        if (data.hasOwnProperty(dyn_selects[elem].tgt)) {
          var options = data[dyn_selects[elem].tgt];
          if (options instanceof Array) {
            var opt = '<option value=""><?php echo $this->l10n->_('Choose...'); ?></option>';
            for (var i = 0; i < options.length; i++) {
              opt += '<option value="' + options[i].id + '">' + options[i].name + '</option>';
            }
            $('[name='+dyn_selects[elem].tgt+']').empty().html(opt).selectpicker('refresh');
          }
        }
        $('#csrf').val(data.csrf);
      }
    });
  });
  var ips = $('[name=ipaddr],[name=netmask],[name=gateway],[name=dns1],[name=dns2]');
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
          content:'<?php echo $this->l10n->_('This camera is set as charged manually.'); ?>',
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
      nextYear: '<?php echo $this->l10n->_('Next Year'); ?>'
    }
  });
<?php if (isset($discover) && $discover == 1) { ?>
  ips.attr('disabled', true);
<?php } ?>
<?php if (isset($promotion) && $promotion == 1) { ?>
  $('[name=promo_nosurveil]').iCheck('enable');
<?php } ?>
});
</script>

</body>
</html>
