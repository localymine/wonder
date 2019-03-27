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
      <h1><?php echo $this->l10n->_('Manage Agentboxes'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/index', $this->l10n->_('Manage Agentboxes'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <?php echo $this->tag->form(array('servicer/agentboxes/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

        <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

        <?php echo $this->tag->hiddenField(array('member_id', 'value' => $member->id)); ?>

        <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

        <div class="box-body">
<?php if (isset($group)) { ?>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $this->escaper->escapeHtml($group->parent->parent->name); ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Area'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $this->escaper->escapeHtml($group->parent->name); ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Endpoint'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $this->escaper->escapeHtml($group->name); ?></span>
              <?php echo $this->tag->hiddenField(array('group_id', 'value' => $group->id)); ?>

            </div>
          </div>
<?php } else { ?>

          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $this->escaper->escapeHtml($layer1->name); ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Area'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->select(array('layer2', $layer2, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Endpoint'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->select(array('group_id', $layer3, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

            </div>
          </div>
<?php } ?>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Agentbox Name'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('HW Address'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('hwaddr', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('IP Address(static)'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('ipaddr', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Netmask'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('netmask', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="netmask" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Gateway'); ?></label>
            <div class="col-xs-12 col-sm-4">
              <?php echo $this->tag->textField(array('gateway', 'class' => 'form-control')); ?>

            </div>
          </div>
          <div class="form-group required">
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
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Surveil camera'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="surveil">
                  <?php echo $this->tag->checkField(array('surveil', 'value' => 1)); ?> <?php echo $this->l10n->_('Surveil this Agentbox'); ?>

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
            <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3')); ?>

            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

            <?php echo $this->tag->linkTo(array('servicer/agentboxes/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

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
      member_id:<?php echo $member->id; ?>,
      caller:2,
      csrf:token
    };
    if (!isNaN(caller_id)) {
      post_data.caller_id = caller_id;
    }
    $.ajax({
      url:'<?php echo $this->url->get('servicer/groups/getchildren'); ?>',
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
            var opt = '<option value=""><?php echo $this->l10n->_('Choose...'); ?></option>';
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
