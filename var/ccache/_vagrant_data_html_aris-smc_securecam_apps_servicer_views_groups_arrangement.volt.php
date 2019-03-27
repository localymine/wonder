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
        <li><?= $this->tag->linkTo(['servicer/groups/index', $this->l10n->_('Manage Groups')]) ?></li>
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
          <div class="row">
            <div class="hidden-xs col-sm-4">
              <h4><?= $this->l10n->_('Group root') ?></h4>
            </div>
            <div class="hidden-xs col-sm-4">
              <h4><?= $this->l10n->_('Area') ?></h4>
            </div>
            <div class="hidden-xs col-sm-4">
              <h4><?= $this->l10n->_('Endpoint') ?></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-4">
<?php if (isset($layer1)) { ?>
              <div class="input-group input-group-sm input-group-fake group-header-pad">
                <span class="form-control"><?= $layer1->name ?></span>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><?= $this->tag->linkTo(['servicer/groups/show/' . $layer1->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Layer')]) ?></li>
                    <li><?= $this->tag->linkTo(['servicer/groups/new/' . $member->id . '/' . $layer1->id, $this->l10n->_('<i class="fa fa-file"></i> New Area')]) ?></li>
                  </ul>
                </span>
              </div>
<?php } else { ?>
              <?= $this->tag->linkTo(['servicer/groups/new/' . $member->id . '/1', $this->l10n->_('New Root Group'), 'class' => 'btn btn-primary btn-md btn-block']) ?>

<?php } ?>
            </div>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($layer2)) { ?>
<?php $this->partial('groups/arrangement-layer2', ['layer2' => $layer2, 'layer3' => $layer3]); ?>
<?php } ?>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-xs-12 col-sm-12 align-center">
              <?= $this->tag->linkTo(['servicer/members/show/' . $member->id, $this->l10n->_('Back to Detail of Member'), 'class' => 'silent']) ?>
            </div>
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
