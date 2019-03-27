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
<?= $this->escaper->escapeHtml($this->flash->output()) ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
          <?= $this->tag->linkTo(['servicer/cameras/new/', $this->l10n->_('<i class="fa fa-file"></i><span>New</span>'), 'class' => 'btn btn-primary btn-sm xcenter']) ?>

          <button class="btn btn-default btn-sm xoutput exportcsv" type="submit"><?= $this->l10n->_('<i class="fa fa-file-excel-o"></i><span>Export</span>') ?></button>

        </div>
        <div class="box-body" data-csrftoken="<?= $this->security->getToken() ?>">

<?= $this->partial('partials/paginator/cameras') ?>

        </div>
      </div>

<?= $this->partial('partials/filter/cameras') ?>

<?= $this->partial('partials/csvconformation') ?>
    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

<?= $this->partial('partials/paginatorscript') ?>
<?= $this->tag->javascriptInclude('js/searchform.js') ?>
<script>
$(function() {
  $.searchform({
    modal    : '.filter-dialog',
    cancelBtn: 'button[filter-handler=reset]',
    submitBtn: 'button[filter-handler=apply]',
    formOpen : 'button.page-filter',
    formEntry: ['root_id','area_id','group_id','name','abox_name','hwaddr','status','motion'],
    childrenPath:'<?= $this->url->get('servicer/groups/getchildren') ?>',
    chooseLabel :'<?= $this->l10n->_('Choose...') ?>'
  });
  $.confirmationform({
    modal: '.confirmation-dialog',
    cancelBtn: 'button[filter-handler=cancel]',
    submitBtn: 'button[filter-handler=ok]',
    formOpen : 'button.exportcsv',
    childrenPath:'<?= $this->url->get('servicer/cameras/exportcsv') ?>',
    message: '<?= $this->l10n->_('Do you want to Export CSV?') ?>'
  });
  $(document).on('mouseover', '.meta-href.enable', function(evt) {
    $(evt.target).tooltip('show');
  }).on('mouseout', '.meta-href.enable', function(evt) {
    $(evt.target).tooltip('hide');
  }).on('click', '.meta-href.enable', function(evt) {
    var addr = 'http://' + evt.target.textContent + '/';
    window.open(addr);
  }).keydown(function(evt) {
    if (evt.keyCode === 18) {
      $('.meta-href').addClass('enable').tooltip({
        title:'<?= $this->l10n->_('Go to this IP address') ?>'
      });
    }
  }).keyup(function(evt) {
    $('.meta-href').removeClass('enable').tooltip('destroy');
  });
  $(window).on('blur', function() {
    $(document).keyup();
  }).on('unload', function() {
    $(document).off('blur')
      .off('mouseover', '.meta-href.enable')
      .off('mouseout', '.meta-href.enable')
      .off('click', '.meta-href.enable');
  });
});
</script>
<?= $this->partial('partials/pickerscript') ?>

</body>
</html>
