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
      <li><a href="javascript:void(0);"><?= $this->l10n->_('Network Machine') ?></a></li>
    </ol>
  </section>

  <section class="content">

    <?php if (isset($networkmachine_id) && $networkmachine_id > 0) { ?>
      <?= $this->tag->form(['servicer/network/updatemachine/' . $group->id . '/' . $networkmachine_id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>
    <?php } else { ?>
      <?= $this->tag->form(['servicer/network/savemachine/' . $group->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>
    <?php } ?>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>

      <div class="box-body">

        <div class="form-group">
          <label class="col-xs-12 col-sm-12"><?= $this->l10n->_('Actived network machine') ?></label>
        </div>

        <div>
          <table class="table table-responsive">
            <thead>
            <tr>
              <th><?= $this->l10n->_('Line Type') ?></th>
              <th><?= $this->l10n->_('Manufacture') ?></th>
              <th><?= $this->l10n->_('Product name・number') ?></th>
              <th><?= $this->l10n->_('IP Address') ?></th>
              <th><?= $this->l10n->_('HW Address') ?></th>
              <th><?= $this->l10n->_('Status') ?></th>
              <th><?= $this->l10n->_('Remarks') ?></th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($model)) { ?>
              <?php foreach ($model as $machine) { ?>
                <tr>
                  <td><?= $machine->devicetype->name ?></td>
                  <td><?= $machine->manufacture->name ?></td>
                  <td><?= $machine->productname ?></td>
                  <td><?= $machine->ipaddr ?></td>
                  <td><?= $machine->hwaddr ?></td>
                  <td><?= $machine->remarks ?></td>
                  <td><?= ($machine->deleted == 1 ? $this->l10n->_('Deleted') : $this->l10n->_('Actived')) ?></td>
                  <td><?= $this->tag->linkTo(['servicer/network/editmachine/' . $group->id . '/' . $machine->id, $this->l10n->_('Edit')]) ?></td>
                </tr>
              <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="list-seperator"></div>

        <?= $this->flash->output() ?>

        <div class="form-group required">
          <label for="devicetype_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Device types') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if (isset($modelMachine)) { ?>
              <?= $this->tag->setDefault('devicetype_id', $modelMachine->devicetype_id) ?>
            <?php } ?>
            <?= $this->tag->select(['devicetype_id', $devicetypes, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
          </div>
        </div>

        <div class="form-group required">
          <label for="manufacture_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Manufactures') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if (isset($modelMachine)) { ?>
              <?= $this->tag->setDefault('manufacture_id', $modelMachine->manufacture_id) ?>
            <?php } ?>
            <?= $this->tag->select(['manufacture_id', $manufactures, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
          </div>
        </div>

        <div class="form-group required">
          <label for="productname" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Product name・number') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if (isset($modelMachine)) { ?>
              <?= $this->tag->setDefault('productname', $modelMachine->productname) ?>
            <?php } ?>
            <?= $this->tag->textField(['productname', 'class' => 'form-control']) ?>
          </div>
        </div>

        <div class="form-group">
          <label for="ipaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('IP Address') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if (isset($modelMachine)) { ?>
              <?= $this->tag->setDefault('ipaddr', $modelMachine->ipaddr) ?>
            <?php } ?>
            <?= $this->tag->textField(['ipaddr', 'class' => 'form-control']) ?>
          </div>
        </div>

        <div class="form-group">
          <label for="hwaddr" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('HW Address') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if (isset($modelMachine)) { ?>
              <?= $this->tag->setDefault('hwaddr', $modelMachine->hwaddr) ?>
            <?php } ?>
            <?= $this->tag->textField(['hwaddr', 'class' => 'form-control']) ?>
          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Remarks') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if (isset($modelMachine)) { ?>
              <?= $this->tag->setDefault('remarks', $modelMachine->remarks) ?>
            <?php } ?>
            <?= $this->tag->textArea(['remarks', 'class' => 'form-control']) ?>
          </div>
        </div>

        <div class="form-check">
          <label for="deleted" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Deleted') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if ((isset($modelMachine) && $modelMachine->deleted == 1)) { ?>
              <?= $this->tag->checkField(['deleted', 'class' => 'form-check-input', 'checked' => 'checked']) ?>
            <?php } else { ?>
              <?= $this->tag->checkField(['deleted', 'class' => 'form-check-input']) ?>
            <?php } ?>
            <label class="form-check-label" for="deleted"><?= $this->l10n->_('This machine has been deleted from the network.') ?></label>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          <div class="col-xs-12 col-sm-12">
            <div class="text-center">
              <?= $this->tag->linkTo(['servicer/network/show/' . $group->id, $this->l10n->_('Back'), 'class' => 'btn btn-primary']) ?>
              <?= $this->tag->submitButton([$this->l10n->_('Submit'), 'class' => 'btn btn-success']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->tag->endForm() ?>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

</body>
</html>
