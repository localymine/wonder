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
        <?php echo $this->tag->form(array('servicer/aboxoptions/saveoption/ntp/' . $agentbox->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

        <div class="box-body">
          <?php echo $this->tag->hiddenField(array('id', 'value' => $agentbox->id)); ?>

          <?php echo $this->tag->hiddenField(array('member_id', 'value' => $agentbox->member_id)); ?>

          <?php echo $this->tag->hiddenField(array('user_id', 'value' => $agentbox->user_id)); ?>

          <div class="form-group">
            <label for="ntpdate" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('NTP setting'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio-inline">
<?php if ($agentbox->ntpdate == 1) { ?>
                <label><?php echo $this->tag->radioField(array('ntpdate_1', 'name' => 'ntpdate', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Refer NTP server'); ?></label>

<?php } else { ?>
                <label><?php echo $this->tag->radioField(array('ntpdate_1', 'name' => 'ntpdate', 'value' => 1)); ?> <?php echo $this->l10n->_('Refer NTP server'); ?></label>

<?php } ?>
              </div>
              <div class="radio-inline">
<?php if ($agentbox->ntpdate == 0) { ?>
                <label><?php echo $this->tag->radioField(array('ntpdate_0', 'name' => 'ntpdate', 'value' => 0, 'checked' => true)); ?> <?php echo $this->l10n->_('Refer This server'); ?></label>

<?php } else { ?>
                <label><?php echo $this->tag->radioField(array('ntpdate_0', 'name' => 'ntpdate', 'value' => 0)); ?> <?php echo $this->l10n->_('Refer This server'); ?></label>

<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="ntpfqdn" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('NTP server address'); ?></label>
            <div class="col-xs-12 col-sm-8">
<?php if ($agentbox->ntpdate == 1) { ?>
                <?php echo $this->tag->textField(array('ntpfqdn', 'class' => 'form-control', 'value' => $agentbox->ntpfqdn)); ?>

<?php } else { ?>
                <?php echo $this->tag->textField(array('ntpfqdn', 'class' => 'form-control', 'disabled' => true, 'value' => $agentbox->ntpfqdn)); ?>

<?php } ?>
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
    $('[name=ntpdate]').iCheck({
      radioClass:'iradio_minimal-blue'
    }).on('ifChecked', function(evt) {
      if (this.value == 1) {
        $('[name=ntpfqdn]').removeAttr('disabled');
      } else {
        $('[name=ntpfqdn]').attr('disabled', 'disabled');
      }
      $(this).attr('checked','checked');
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked');
    }).iCheck('update');
  });
</script>

</body>
</html>
