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
      <h1><?= $this->l10n->_('Manage Groups') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/groups/index/' . $group->member_id, $this->l10n->_('Manage Groups')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>

        <?= $this->tag->form(['servicer/networks/search', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <div class="box-body">

          <div class="form-group">
            <label class="col-xs-12 col-sm-12"><?= $this->l10n->_('Search active network devices') ?></label>
          </div>

<?php if ($identity['role_id'] == 1) { ?>
          <div class="form-group">
            <label for="servicer" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Servicer') ?></label>
            <div class="col-xs-12 col-sm-5">
              <?= $this->tag->select(['servicer', $users, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-dropup-auto' => 'false', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
            </div>
          </div>
<?php } ?>

          <div class="form-group">
            <label for="linetypes" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Line type') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->select(['linetype_id', $linetypes, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-dropup-auto' => 'false', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

            </div>
            <div class="col-xs-12 col-sm-5">
              <?= $this->tag->textField(['name', 'class' => 'form-control', 'placeholder' => $this->l10n->_('Keywords')]) ?>

            </div>
          </div>

          <div class="form-group">
            <label for="agentbox" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Agentbox') ?></label>
            <div class="col-xs-12 col-sm-5">
              <div class="checkbox-inline">
                <?= $this->tag->checkField(['agentbox', 'class' => 'form-check-input']) ?>

                <label class="form-check-label" for="agentbox"><?= $this->l10n->_('Using Agentbox') ?></label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="keyword" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Keywords') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['keyword', 'class' => 'form-control']) ?>

            </div>
          </div>

          <div class="form-group">
            <ul class="ulcond lstcond">
<?= $this->partial('partials/conditionrow') ?>
            </ul>
          </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-9 col-sm-offset-3">
              <a class="acond addcond" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> <?= $this->l10n->_('Add more condition') ?></a>
            </div>
          </div>

          <div class="form-group">
            <div class="action-area">
              <?= $this->tag->submitButton([$this->l10n->_('Search'), 'class' => 'btn btn-primary text-right']) ?>

            </div>
          </div>

          <?= $this->tag->setDefault('count', ((isset($posts['conds']) ? ($this->length($posts['conds'])) : 1))) ?>
          <?= $this->tag->hiddenField(['count']) ?>

        <?= $this->tag->endForm() ?>

        <div class="box-footer">

          <table id="search-result" class="table table-responsive">
          <thead>
          <tr>
          <th><?= $this->l10n->_('Group') ?></th>
          <th><?= $this->l10n->_('Member') ?></th>
<?php if ($identity['role_id'] == 1) { ?>
          <th><?= $this->l10n->_('Servicer') ?></th>

<?php } ?>
          <th><?= $this->l10n->_('Device type') ?></th>
          <th><?= $this->l10n->_('Manufacturer') ?></th>
          <th><?= $this->l10n->_('Agentbox') ?></th>
          </tr>
          </thead>
          </table>

        </div>
      </div>

    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

<?= $this->tag->javascriptInclude('js/search-network.js') ?>
<script>
$(function() {
  $('.selectpicker').selectpicker({
    theme:'bootstrap',
    language:'ja',
    dropupAuto:false,
    size:10,
    noneSelectedText:'<?= $this->l10n->__('Nothing selected', 'Picker') ?>',
    noneResultsText:'<?= $this->l10n->__('No results matched {0}', 'Picker') ?>',
    countSelectedText:'<?= $this->l10n->__('{0} item(s) selected', 'Picker') ?>',
    maxOptionsText:'<?= $this->l10n->__('Limit reached ({n} item(s) max)', 'Picker') ?>',
    selectAllText:'<?= $this->l10n->__('Select All', 'Picker') ?>',
    deselectAllText:'<?= $this->l10n->__('Deselect All', 'Picker') ?>',
    doneButtonText:'<?= $this->l10n->__('Close', 'Picker') ?>',
    liveSearchPlaceholder:'<?= $this->l10n->__('Enter any chars to search', 'Picker') ?>',
  });
});
</script>

<script>
$(document).ready(function () {

  $.searchNetworkForm({
    devicetypes: <?= $devicetypes_json ?>,
    devicetyesSelectDefault: "<?= $this->l10n->_('Device type') ?>",
    manufactures: <?= $manufactures_json ?>,
    manufacturesSelectDefault: "<?= $this->l10n->_('Manufacturer') ?>",
    keywordsPlaceholder: "<?= $this->l10n->_('Keywords') ?>",
    addButton: "a.addcond",
    listCondition: "ul.lstcond",
    deleteButton: "a.deletecond",
    warningMessage: "<?= $this->l10n->_('Can not add more condition.') ?>",
    count: <?= $count ?>
  });

  $.searchNetwork({
    tableData: <?= $data ?>,
    roleId: <?= $identity['role_id'] ?>,
    emptyTable: "<?= $this->l10n->_('No data available in table.') ?>"
  });
  $('[name=agentbox]').iCheck({
    checkboxClass:'icheckbox_minimal-blue'
  }).on('ifChecked', function(evt) {
    $(this).iCheck('check').prop('checked', 'checked');
  }).on('ifUnchecked', function(evt) {
    $(this).iCheck('uncheck').removeAttr('checked');
  });
});
</script>

</body>
</html>
