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
    </ol>
  </section>

  <section class="content">
    <?= $this->flash->output() ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>

      <div class="box-body">
        <div class="row">
          <label class="col-xs-12 col-sm-3"><?= $this->l10n->_('Network Figure') ?></label>
          <div class="col-xs-12 col-sm-9">
            <div class="text-center">
              <div>
                <?php if ((isset($modelFigure->image) && $modelFigure->image != '')) { ?>
                  <?= $this->tag->image(['/servicer/network/image/' . $group->id, 'class' => 'img-thumbnail']) ?>
                <?php } else { ?>
                  <i class="fa fa-image fa-5x"></i>
                <?php } ?>
              </div>
              <div class="mt-3">
              <?php if ((isset($modelFigure->file) && $modelFigure->file != '')) { ?>
                <?= $this->tag->linkTo(['servicer/network/file/' . $group->id, $this->l10n->_('Download File')]) ?> <br>
                <?= $modelFigure->file . ' (' . $filesize . ' kb)' ?>
              <?php } else { ?>
                <i class="fa fa-file fa-5x"></i>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <label class="col-xs-12 col-sm-12"><?= $this->l10n->_('Line type connection') ?></label>
        </div>

        <div>
          <div class="col-xs-12 col-sm-4 col-sm-offset-1 mt-3">
            <?php if (isset($modelFigure->linetype->name)) { ?>
              <?= $modelFigure->linetype->name . ' - ' . $modelFigure->servicename ?>
            <?php } ?>
          </div>
          <div class="col-xs-12 col-sm-5">
            <div class="text-center">
              <?= $this->tag->linkTo(['servicer/network/editfigure/' . $group->id, $this->l10n->_('Edit'), 'class' => 'btn btn-success']) ?>
            </div>
          </div>
        </div>

        <div class="row mt-max">
          <label class="col-xs-12 col-sm-12"><?= $this->l10n->_('Activated network device・History') ?></label>
        </div>

        <div class="row">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tabA" data-toggle="tab"><?= $this->l10n->_('Network Device') ?></a></li>
            <li><a href="#tabB" data-toggle="tab"><?= $this->l10n->_('History') ?></a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tabA">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th><?= $this->l10n->_('Type') ?></th>
                    <th><?= $this->l10n->_('Manufacture') ?></th>
                    <th><?= $this->l10n->_('Product name・number') ?></th>
                    <th><?= $this->l10n->_('IP Address') ?></th>
                    <th><?= $this->l10n->_('HW Address') ?></th>
                    <th><?= $this->l10n->_('Remarks') ?></th>
                    <th><?= $this->l10n->_('Status') ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php if (isset($modelMachine)) { ?>
                  <?php foreach ($modelMachine as $machine) { ?>
                  <tr>
                    <td><?= $machine->devicetype->name ?></td>
                    <td><?= $machine->manufacture->name ?></td>
                    <td><?= $machine->productname ?></td>
                    <td><?= $machine->ipaddr ?></td>
                    <td><?= $machine->hwaddr ?></td>
                    <td><?= $machine->remarks ?></td>
                    <td><?= ($machine->deleted == 1 ? $this->l10n->_('Deleted') : $this->l10n->_('Actived')) ?></td>
                  </tr>
                  <?php } ?>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="tabB">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th><?= $this->l10n->_('Updated Datetime') ?></th>
                    <th><?= $this->l10n->_('Updated Content') ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($modelLog as $log) { ?>
                  <tr>
                    <td><?= $log->created ?></td>
                    <td><?= $log->description ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12">
          <div class="text-center">
            <?= $this->tag->linkTo(['servicer/network/editmachine/' . $group->id, $this->l10n->_('Edit'), 'class' => 'btn btn-success']) ?>
          </div>
        </div>
      </div>

      <div class="box-footer">
        <div class="action-area">

        </div>
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

</body>
</html>
