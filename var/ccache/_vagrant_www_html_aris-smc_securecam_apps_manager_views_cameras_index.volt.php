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

    <section class="content-header">
      <h1><?= $this->l10n->_('Manage Camera for Charge') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['manager/cameras/index', $this->l10n->_('Manage Camera for Charge')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['manager/cameras/calc', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'calc-camera']) ?>

        <div class="box-body">
          <div class="form-group">
            <label for="target_date" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Month to calculate') ?></label>
            <div class="col-xs-12 col-sm-3">
              <div class="input-group">
                <?= $this->tag->textField(['target_date', 'name' => 'target_date', 'class' => 'form-control']) ?>

                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="user" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Servicer Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['user', $users, 'name' => 'user', 'using' => ['id', 'name'], 'class' => 'form-control selectpicker', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose all'), 'emptyValue' => '*']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="membergroup" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Membergroup Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['membergroup', $membergroups, 'name' => 'membergroup', 'using' => ['id', 'name'], 'class' => 'form-control selectpicker', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose all'), 'emptyValue' => '*']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="member" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Member Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->select(['member', $members, 'name' => 'member', 'using' => ['id', 'name'], 'class' => 'form-control selectpicker', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose all'), 'emptyValue' => '*']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="bitrate" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Bit rate') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->select(['bitrate', $bitrates, 'name' => 'bitrate', 'using' => ['value', 'name'], 'class' => 'form-control selectpicker', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose all'), 'emptyValue' => '*']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="preserve" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Preserve') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->select(['preserve', $preserves, 'name' => 'preserve', 'using' => ['value', 'name'], 'class' => 'form-control selectpicker', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose all'), 'emptyValue' => '*']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="duties" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('The usage-based fee') ?></label>
            <div class="col-xs-12 col-sm-3">
                <?= $this->tag->textField(['duties', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="usedrm" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DRM Optional usage') ?></label>
            <div class="col-xs-12 col-sm-3"><?php $drms = ['なし', 'あり']; ?>
              <?= $this->tag->select(['usedrm', $drms, 'name' => 'usedrm', 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose all'), 'emptyValue' => '*']) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="drmfee" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('DRM fee') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->textField(['drmfee', 'name' => 'drmfee', 'class' => 'form-control']) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('The number of Cameras') ?></label>
            <div class="col-xs-12 col-sm-3 align-right">
              <span class="form-control"><?php if (isset($counts)) { ?><strong><?= $this->escaper->escapeHtml($counts) ?></strong><?php } ?> <?= $this->l10n->_('[units]') ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Total fee of This Month') ?></label>
            <div class="col-xs-12 col-sm-3 align-right">
              <span class="form-control"><?php if (isset($totalfee)) { ?><strong><?= $this->escaper->escapeHtml(number_format($totalfee)) ?></strong><?php } ?> <?= $this->l10n->_('[Yen]') ?></span>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Calculate'), 'class' => 'btn btn-info']) ?>

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
  $(function() {
    var _d = new Date();
    _d.setMonth(_d.getMonth() - 1);
    $('[name=target_date]').datetimepicker({
      format:'Y-MM',
      viewMode:'months',
      defaultDate:_d,
      locale:'ja',
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
        nextYear: '<?= $this->l10n->_('Next Year') ?>',
        selectTime: '<?= $this->l10n->_('Select Time') ?>'
      }
    });
    $('#exportcsv').click(function(){
      var original = $('#calc-camera').attr('action');
      $('#calc-camera').attr('action', '<?= $this->url->get('manager/cameras/exportcsv') ?>');
      $('#calc-camera').submit();
      //$('#calc-camera').attr('action', original);
    });
  });
</script>

</body>
</html>
