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
      <h1><?= $this->escaper->escapeHtml($page_heading) ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard') ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->l10n->_('Servicer Profile') ?></h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
          <colgroup>
          <col class="col-4">
          <col class="col-8">
          </colgroup>
          <tbody>
          <tr>
          <th><?= $this->l10n->_('Servicer Name') ?></th>
          <td><?= $this->escaper->escapeHtml($user->name) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Service Name') ?></th>
          <td><?= $this->escaper->escapeHtml($user->servicename) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Role') ?></th>
          <td><?= $this->escaper->escapeHtml($user->role->name) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Email Address') ?>1</th>
          <td><?= $this->escaper->escapeHtml($user->email1) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Email Address') ?>2</th>
          <td><?= $this->escaper->escapeHtml($user->email2) ?></td>
          </tr>
          </tbody>
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


</body>
</html>
