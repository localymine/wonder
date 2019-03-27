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
        <?= $this->tag->form(['servicer/agentboxes/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['user_id', 'value' => $identity['id']]) ?>

        <?= $this->tag->hiddenField(['member_id', 'value' => $member->id]) ?>

        <?= $this->tag->hiddenField(['csrf', 'value' => $this->security->getToken()]) ?>

        <div class="box-body">
<?php if (isset($group)) { ?>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($group->parent->parent->name) ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Area') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($group->parent->name) ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Endpoint') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($group->name) ?></span>
              <?= $this->tag->hiddenField(['group_id', 'value' => $group->id]) ?>

            </div>
          </div>
<?php } else { ?>

          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($layer1->name) ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Area') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['layer2', $layer2, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Endpoint') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['group_id', $layer3, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

            </div>
          </div>
<?php } ?>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Agentbox Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('HW Address') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['hwaddr', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('IP Address(static)') ?></label>
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
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Gateway') ?></label>
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
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Surveil camera') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="surveil">
                  <?= $this->tag->checkField(['surveil', 'value' => 1]) ?> <?= $this->l10n->_('Surveil this Agentbox') ?>

                </label>
              </div>
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

<script>
$(function() {
  $('[type=checkbox]').iCheck({
    checkboxClass:'icheckbox_minimal-blue'
  }).on('ifChecked', function(evt) {
    $(this).attr('checked',true).val(1);
  }).on('ifUnchecked', function(evt) {
    $(this).removeAttr('checked').val(0);
  });
  $('[name=layer2]').on('change', function(evt) {
    var token = $('#csrf').val();
    var caller_id = parseInt($(this).val());
    var post_data = {
      member_id:<?= $member->id ?>,
      caller:2,
      csrf:token
    };
    if (!isNaN(caller_id)) {
      post_data.caller_id = caller_id;
    }
    $.ajax({
      url:'<?= $this->url->get('servicer/groups/getchildren') ?>',
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
        if (data.hasOwnProperty('group_id')) {
          var options = data.group_id;
          if (options instanceof Array) {
            var opt = '<option value=""><?= $this->l10n->_('Choose...') ?></option>';
            for (var i = 0; i < options.length; i++) {
              opt += '<option value="' + options[i].id + '">' + options[i].name + '</option>';
            }
            $('[name=group_id]').empty().html(opt).selectpicker('refresh');
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
