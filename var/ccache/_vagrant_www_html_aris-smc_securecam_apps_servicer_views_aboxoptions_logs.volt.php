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
      <h1><?= $this->l10n->_('Manage Agentboxes') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/agentboxes/index', $this->l10n->_('Manage Agentboxes')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/agentboxes/show/' . $agentbox->id, $this->l10n->_('Detail of Agentbox')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <div class="box-body">

<?= $this->nav->getPaginator($page, 'servicer/aboxoptions/logs/' . $agentbox->id, 'ontop hidden-filter') ?>

          <table class="table table-bordered table-condenced table-hover aboxlogs-list">
          <colgroup>
          <col class="col-2">
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?= $this->l10n->_('Uploaded datetime') ?></th>
          <th><?= $this->l10n->_('Logfile Name') ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php $v173046121743968504341iterated = false; ?><?php foreach ($page->items as $log) { ?><?php $v173046121743968504341iterated = true; ?>
          <tr>
          <td><?= date('Y-m-d H:i:s', strtotime($log->created)) ?></td>
          <td><?= $this->escaper->escapeHtml($log->filename) ?></td>
<?php if ($log->size < 2000000) { ?>
          <td><?= $this->tag->linkTo(['servicer/aboxlogs/show/' . $log->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show')]) ?>
<?php } else { ?>
          <td><?= $this->tag->linkTo(['#', '<i class="fa fa-eye-slash"></i>', 'class' => 'btn btn-xs btn-default disabled']) ?>
<?php } ?>

              <?= $this->tag->linkTo(['servicer/aboxlogs/download/' . $log->id, '<i class="fa fa-download"></i>', 'class' => 'btn btn-xs btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Download')]) ?>

              <?= $this->tag->linkTo(['servicer/aboxlogs/delete/' . $log->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete')]) ?></td>
          </tr>
<?php } if (!$v173046121743968504341iterated) { ?>
          <tr>
          <td></td>
          <td><?= $this->l10n->_('The uploaded log does not exist.') ?></td>
          <td><a href="#" class="btn btn-xs btn-default disabled"><i class="fa fa-eye-slash"></i></a>
              <a href="#" class="btn btn-xs btn-default disabled"><i class="fa fa-download"></i></a>
              <a href="#" class="btn btn-xs btn-default disabled"><i class="fa fa-trash"></i></a></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?= $this->nav->getPaginator($page, 'servicer/aboxoptions/logs/' . $agentbox->id, 'onbottom') ?>

        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/agentboxes/show/' . $agentbox->id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

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

<?= $this->partial('partials/paginatorscript') ?>

</body>
</html>
