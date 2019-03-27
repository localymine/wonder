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
      <h1><?= $this->l10n->_('Manage Recorders') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/recorders/index', $this->l10n->_('Manage Recorders')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['servicer/recorders/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['user_id', 'value' => $identity['id']]) ?>

        <?= $this->tag->hiddenField(['member_id', 'value' => $member->id]) ?>

        <?= $this->tag->hiddenField(['csrf', 'value' => $this->security->getToken()]) ?>

        <div class="box-body">
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($group)) { ?>
              <span class="form-control"><?= $this->escaper->escapeHtml($group->parent->parent->name) ?></span>
<?php } else { ?>
              <span class="form-control"><?= $this->escaper->escapeHtml($layer1->name) ?></span>
<?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Area') ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($group)) { ?>
              <span class="form-control"><?= $this->escaper->escapeHtml($group->parent->name) ?></span>
<?php } else { ?>
              <?= $this->tag->select(['layer2', $layer2, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

<?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label for="group_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Endpoint') ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($group)) { ?>
              <span class="form-control"><?= $this->escaper->escapeHtml($group->name) ?></span>
              <?= $this->tag->hiddenField(['group_id', 'value' => $group->id]) ?>

<?php } else { ?>
              <?= $this->tag->select(['group_id', $layer3, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

<?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label for="agentbox_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Agentbox Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['agentbox_id', $agentboxes, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Recorder Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('IP Address') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['ipaddr', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Netmask') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['netmask', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="gateway" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Gateway') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['gateway', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="dns1" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DNS') ?>1</label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['dns1', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="dns2" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DNS') ?>2</label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['dns2', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('HW Address') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['hwaddr', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="manufacturer" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Manufacturer') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['manufacturer', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="model" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Model Name') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['model', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Temporarily suspend agent process on the server') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="disabled">
                  <?= $this->tag->checkField(['disabled', 'value' => 1]) ?> <?= $this->l10n->_('Suspend') ?>

                </label>
              </div>
              <div>
                <?= $this->tag->setDefault('detect_interval', (isset($pdetect_interval) ? $pdetect_interval : $detect_interval_default)) ?>
                <?= $this->l10n->_('Mail transfer detection') ?>
                <?php if (isset($pdisabled)) { ?>
                  <?= $this->tag->textField(['detect_interval', 'class' => 'form-control inline mins-box', 'disabled' => 'disabled']) ?>
                <?php } else { ?>
                  <?= $this->tag->textField(['detect_interval', 'class' => 'form-control inline mins-box']) ?>
                <?php } ?>
                <?= $this->l10n->_('min') ?>
              </div>
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

            <?= $this->tag->linkTo(['servicer/recorders/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

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
  $('[name=disabled]').iCheck({
    checkboxClass:'icheckbox_minimal-blue'
  }).on('ifChecked', function(evt) {
    $(this).attr('checked', true).val(1);
  }).on('ifUnchecked', function(evt) {
    $(this).removeAttr('checked').val(0);
  });
  var dyn_selects = {
    layer2:{
      url:'<?= $this->url->get('servicer/groups/getchildren') ?>',
      tgt:'group_id',
      caller:2
    },
    group_id:{
      url:'<?= $this->url->get('servicer/agentboxes/getchildren') ?>',
      tgt:'agentbox_id',
      caller:3
    }
  };
  $('[name=layer2],[name=group_id]').on('change', function(evt) {
    var token = $('#csrf').val();
    var elem  = $(this).attr('name');
    var caller_id = parseInt($(this).val());
    var post_data = {
      member_id:<?= $member->id ?>,
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
            var opt = '<option value=""><?= $this->l10n->_('Choose...') ?></option>';
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
});
</script>

</body>
</html>
