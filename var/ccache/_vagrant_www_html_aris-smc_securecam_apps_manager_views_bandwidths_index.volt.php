<?= $this->tag->getDoctype() ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<?= $this->partial('partials/stylesheets') ?>
<!--[if lt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/html5shiv.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/respond.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/excanvas.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?= $this->partial('partials/mainheader') ?>
</header>

<aside class="main-sidebar">

<?= $this->partial('partials/sidebar') ?>

</aside>

<div class="content-wrapper">

    <section class="content-header" >
      <h1><?= $this->l10n->_('Manage Bandwidth for Charge') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['manager/bandwidths/index', $this->l10n->_('Manage Bandwidth for Charge')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['manager/bandwidths/calc', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'calc-band']) ?>

        <div class="box-body">
          <div class="form-group">
            <label for="target_date" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Month to calculate') ?></label>
            <div class="col-xs-12 col-sm-3">
              <div class="input-group">
                <?= $this->tag->textField(['target_date', 'class' => 'form-control']) ?>

                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="duties" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('The number of contracted Cameras') ?></label>
            <div class="col-xs-12 col-sm-3 align-right">
              <span class="form-control"><?php if (isset($cameras)) { ?><strong><?= $this->escaper->escapeHtml($cameras) ?></strong><?php } ?> <?= $this->l10n->_('[units]') ?></span>
            </div>
          </div>
          <div class="form-group">
            <label for="duties" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Bandwidth Simultaneous use') ?></label>
            <div class="col-xs-12 col-sm-3 align-right">
              <span class="form-control"><?php if (isset($bands)) { ?><strong><?= $this->escaper->escapeHtml($bands) ?></strong><?php } ?> <?= $this->l10n->_('[Mbps]') ?></span>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Calc Bandwidth'), 'class' => 'btn btn-info']) ?>

            <button class="btn btn-default" id="exportcsv"><?= $this->l10n->_('Export as CSV') ?></button>
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
  $(function(){
    var _d = new Date();
    _d.setMonth(_d.getMonth() - 1);
    $('[name=target_date]').datetimepicker({
      format:'Y-MM',
      viewMode:'months',
      defaultDate:_d,
      locale:'ja',
      dayViewHeaderFormat:'<?= $this->l10n->_('M Y') ?>',
      tooltips: {
        today: '<?= $this->l10n->_('Select Today') ?>',
        clear: '<?= $this->l10n->_('Deselect') ?>',
        close: '<?= $this->l10n->_('Close') ?>',
        selectMonth: '<?= $this->l10n->_('Select Month') ?>',
        prevMonth: '<?= $this->l10n->_('Previous Month') ?>',
        nextMonth: '<?= $this->l10n->_('Next Month') ?>',
        selectYear: '<?= $this->l10n->_('Select Year') ?>',
        prevYear: '<?= $this->l10n->_('Previous Year') ?>',
        nextYear: '<?= $this->l10n->_('Next Year') ?>',
        selectTime: '<?= $this->l10n->_('Select Time') ?>'
      }
    });
    $('#exportcsv').click(function(){
      var original = $('#calc-band').attr('action');
      $('#calc-band').attr('action', '<?= $this->url->get('manager/bandwidths/exportcsv') ?>');
      $('#calc-band').submit();
      //$('#calc-band').attr('action', original);
    });
  });
</script>

</body>
</html>
