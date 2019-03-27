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
        <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/show/' . $agentbox->id, $this->l10n->_('Detail of Agentbox'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <?php echo $this->tag->form(array('servicer/aboxoptions/saveoption/traffic/' . $agentbox->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

        <div class="box-body">
          <?php echo $this->tag->hiddenField(array('id', 'value' => $agentbox->id)); ?>

          <?php echo $this->tag->hiddenField(array('member_id', 'value' => $agentbox->member_id)); ?>

          <?php echo $this->tag->hiddenField(array('user_id', 'value' => $agentbox->user_id)); ?>

<?php $idx = 0; ?>
<?php foreach ($tcs as $tc) { ?>
<?php $vidx = $idx + 1; ?>
          <div class="form-group">
            <?php echo $this->tag->hiddenField(array('tc[' . $idx . '][id]', 'name' => 'tc[' . $idx . '][id]', 'value' => $tc->id)); ?>

            <?php echo $this->tag->hiddenField(array('tc[' . $idx . '][sort]', 'name' => 'tc[' . $idx . '][sort]', 'value' => $tc->sort)); ?>

            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Time') . $vidx; ?></label>
            <div class="col-xs-12 col-sm-9">
              <div class="row horizontal">
                <?php echo $this->tag->textField(array('tc[' . $idx . '][begin]', 'name' => 'tc[' . $idx . '][begin]', 'class' => 'form-control col-3', 'value' => $tc->begin)); ?>

                <span class="form-control control-dummy control-dummy-center col-1"><?php echo $this->l10n->_(' ~ '); ?></span>
                <?php echo $this->tag->textField(array('tc[' . $idx . '][end]', 'name' => 'tc[' . $idx . '][end]', 'class' => 'form-control col-3', 'value' => $tc->end)); ?>

                <span class="form-control control-dummy control-dummy-center col-1">&lt;</span>
                <?php echo $this->tag->textField(array('tc[' . $idx . '][threshold]', 'name' => 'tc[' . $idx . '][threshold]', 'class' => 'form-control col-3', 'value' => $tc->threshold)); ?>

                <span class="form-control control-dummy control-dummy-center col-1">Mbps</span>
              </div>
            </div>
          </div>
<?php $idx += 1; ?>
<?php } ?>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Release Limitation'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="forcetc">
<?php if ($agentbox->forcetc == 1) { ?>
                  <?php echo $this->tag->checkField(array('forcetc', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Force No-band-limited'); ?>

<?php } else { ?>
                  <?php echo $this->tag->checkField(array('forcetc', 'value' => 1)); ?> <?php echo $this->l10n->_('Force No-band-limited'); ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>

        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

            <?php echo $this->tag->linkTo(array('servicer/agentboxes/show/' . $agentbox->id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

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
    $('[name=forcetc]').iCheck({
      checkboxClass:'icheckbox_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked',true).val(1);
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked').val(0);
    });

    $('[name*="[begin]"],[name*="[end]"]').datetimepicker({
      format:'HH:mm:ss',
      viewMode:'days',
      locale:'ja',
      dayViewHeaderFormat:'<?php echo $this->l10n->_('M Y'); ?>',
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
