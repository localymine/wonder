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
      <h1><?php echo $this->l10n->_('Manage Campaigns'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/campaigns/index', $this->l10n->_('Manage Campaigns'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->escaper->escapeHtml($this->flash->output()); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
          <?php echo $this->tag->linkTo(array('servicer/campaigns/new/', $this->l10n->_('<i class="fa fa-file"></i><span>New</span>'), 'class' => 'btn btn-primary btn-sm xcenter')); ?>

        </div>
        <div class="box-body" data-csrftoken="<?php echo $this->security->getToken(); ?>">

<?php echo $this->partial('partials/paginator/campaigns'); ?>

        </div>
      </div>

<?php echo $this->partial('partials/filter/campaigns'); ?>

    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

<?php echo $this->partial('partials/paginatorscript'); ?>
<?php echo $this->tag->javascriptInclude('js/searchform.js'); ?>
<script>
$(function() {
  $.searchform({
    modal     : '.filter-dialog',
    cancelBtn : 'button[filter-handler=reset]',
    submitBtn : 'button[filter-handler=apply]',
    formOpen  : 'button.page-filter',
    formEntry : ['name','term_from','term_to']
  });
  $('[name=term_from],[name=term_to]').datetimepicker({
    format: 'Y-MM-DD',
    locale: 'ja',
    useCurrent: true,
    dayViewHeaderFormat: "<?php echo $this->l10n->_('MMM YYYY'); ?>",
    tooltips: {
      today: "<?php echo $this->l10n->_('Select Today'); ?>",
      clear: "<?php echo $this->l10n->_('Deselect'); ?>",
      close: "<?php echo $this->l10n->_('Close'); ?>",
      selectMonth: "<?php echo $this->l10n->_('Select Month'); ?>",
      prevMonth: "<?php echo $this->l10n->_('Previous Month'); ?>",
      nextMonth: "<?php echo $this->l10n->_('Next Month'); ?>",
      selectYear: "<?php echo $this->l10n->_('Select Year'); ?>",
      prevYear: "<?php echo $this->l10n->_('Previous Year'); ?>",
      nextYear: "<?php echo $this->l10n->_('Next Year'); ?>"
    }
  });
});
</script>
<?php echo $this->partial('partials/pickerscript'); ?>

</body>
</html>
