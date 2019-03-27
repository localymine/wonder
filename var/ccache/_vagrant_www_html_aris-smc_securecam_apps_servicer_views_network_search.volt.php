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
    <h1><?= $this->l10n->_('Network  ') ?></h1>
    <ol class="breadcrumb">
      <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
      <li><?= $this->tag->linkTo(['servicer/groups/show/' . $group->id, $this->l10n->_('Detail of Group')]) ?></li>
      <li><?= $this->tag->linkTo(['servicer/network/show/' . $group->id, $this->l10n->_('Network')]) ?></li>
      <li><a href="javascript:void(0);"><?= $this->l10n->_('Search for Network') ?></a></li>
    </ol>
  </section>

  <section class="content">
    <?= $this->flash->output() ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>

      <?= $this->tag->form(['servicer/network/search/' . $group->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>
      <div class="box-body">

        <div class="form-group">
          <label for="image" class="col-xs-12 col-sm-12"><?= $this->l10n->_('Search for actived network device') ?></label>
        </div>

        <?php if ($identity['role_id'] == 1) { ?>
        <div class="form-group">
          <div class="row">
            <label for="servicer" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Servicer') ?></label>
            <div class="col-xs-12 col-sm-5">
              <?= $this->tag->select(['servicer', $users, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
            </div>
          </div>
        </div>
        <?php } ?>

        <div class="form-group">
          <div class="row">
            <label for="linetypes" class="col-xs-12 col-sm-3 control-label text-right"><?= $this->l10n->_('Line type is') ?></label>
            <div class="col-xs-12 col-sm-3">
              <?= $this->tag->select(['linetype_id', $linetypes, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
            </div>
            <div class="col-xs-12 col-sm-5">
              <?= $this->tag->textField(['name', 'class' => 'form-control', 'placeholder' => $this->l10n->_('Keyword')]) ?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label for="agentbox" class="col-xs-12 col-sm-3 control-label text-right"><?= $this->l10n->_('Agentbox') ?></label>
            <div class="col-xs-12 col-sm-5">
              <div class="form-check">
                <?= $this->tag->checkField(['agentbox', 'class' => 'form-check-input']) ?>
                <label class="form-check-label" for="agentbox"><?= $this->l10n->_('Using Agentbox') ?></label>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label for="keyword" class="col-xs-12 col-sm-3 control-label text-right"><?= $this->l10n->_('Keyword') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['keyword', 'class' => 'form-control']) ?>
            </div>
          </div>
        </div>

        <div class="form-group">
          <ul class="ulcond lstcond">
            <?= $this->partial('network/partials/conditionrow') ?>
          </ul>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6 col-sm-6">
              <a class="acond addcond" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> <?= $this->l10n->_('Add more condition') ?></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-11">
              <div class="text-right">
                <?= $this->tag->submitButton([$this->l10n->_('Search'), 'class' => 'btn btn-primary text-right']) ?>
              </div>
            </div>
          </div>
        </div>
        <?= $this->tag->setDefault('count', ((isset($posts['conds']) ? $this->length($posts['conds']) : 1))) ?>
        <?= $this->tag->hiddenField(['count']) ?>

      </div>
      <?= $this->tag->endForm() ?>

      <div class="box-footer">

        <?php if ($identity['role_id'] == 1) { ?>
        <table id="search-result-2" class="table table-responsive">
          <thead>
          <tr>
            <th><?= $this->l10n->_('Group') ?></th>
            <th><?= $this->l10n->_('Member') ?></th>
            <th><?= $this->l10n->_('Servicer') ?></th>
            <th><?= $this->l10n->_('Device type') ?></th>
            <th><?= $this->l10n->_('Manufacture') ?></th>
            <th><?= $this->l10n->_('Agentbox') ?></th>
          </tr>
          </thead>
        </table>
        <?php } else { ?>
          <table id="search-result" class="table table-responsive">
            <thead>
            <tr>
              <th><?= $this->l10n->_('Group') ?></th>
              <th><?= $this->l10n->_('Member') ?></th>
              <th><?= $this->l10n->_('Device type') ?></th>
              <th><?= $this->l10n->_('Manufacture') ?></th>
              <th><?= $this->l10n->_('Agentbox') ?></th>
            </tr>
            </thead>
          </table>
        <?php } ?>

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
    $(document).ready(function () {

      $.searchNetworkForm({
        devicetypes: <?= json_encode($devicetypes) ?>,
        devicetyesSelectDefault: "<?= $this->l10n->_('Device type') ?>",
        manufactures: <?= json_encode($manufactures) ?>,
        manufacturesSelectDefault: "<?= $this->l10n->_('Manufacture') ?>",
        addButton: "a.addcond",
        listCondition: "ul.lstcond",
        deleteButton: "a.deletecond",
        warningMessage: "<?= $this->l10n->_('Can not add more condition.') ?>",
        count: <?= $count ?>
      });

      $.searchNetwork({
        tableData: <?= $data ?>,
        roleId: <?= $identity['role_id'] ?>,
        emptyTable: "<?= $this->l10n->_('No data available in table') ?>"
      });

    });
  </script>

</body>
</html>
