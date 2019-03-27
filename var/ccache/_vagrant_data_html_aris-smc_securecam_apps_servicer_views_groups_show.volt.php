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
        <div class="box-body">
          <table class="table table-bordered">
          <colgroup>
          <col class="col-4">
          <col class="col-8">
          </colgroup>
          <tbody>
          <tr>
          <th><?= $this->l10n->_('Id') ?></th>
          <td><?= $this->escaper->escapeHtml($group->id) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Member Name') ?></th>
          <td><?= $this->tag->linkTo(['servicer/members/show/' . $group->member->id, $this->escaper->escapeHtml($group->member->name), 'class' => 'silent']) ?></td>
          </tr>
<?php if ($group->layer == 1) { ?>
          <tr>
          <th><?= $this->l10n->_('Group root') ?></th>
          <td><?= $this->escaper->escapeHtml($group->name) ?></td>
          </tr>
<?php } else { ?>
<?php if ($group->layer == 2) { ?>
          <tr>
          <th><?= $this->l10n->_('Group root') ?></th>
          <td><?= $this->tag->linkTo(['servicer/groups/show/' . $group->parent->id, $this->escaper->escapeHtml($group->parent->name), 'class' => 'silent']) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Area') ?></th>
          <td><?= $this->escaper->escapeHtml($group->name) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Sort order') ?></th>
          <td><?= $this->escaper->escapeHtml($group->sort) ?></td>
          </tr>
<?php } ?>
<?php if ($group->layer == 3) { ?>
          <tr>
          <th><?= $this->l10n->_('Group root') ?></th>
          <td><?= $this->tag->linkTo(['servicer/groups/show/' . $group->parent->parent->id, $this->escaper->escapeHtml($group->parent->parent->name), 'class' => 'silent']) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Area') ?></th>
          <td><?= $this->tag->linkTo(['servicer/groups/show/' . $group->parent->id, $this->escaper->escapeHtml($group->parent->name), 'class' => 'silent']) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Endpoint') ?></th>
          <td><?= $this->escaper->escapeHtml($group->name) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Sort order') ?></th>
          <td><?= $this->escaper->escapeHtml($group->sort) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Email Address') ?>1</th>
          <td><?= $this->escaper->escapeHtml($group->email1) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Email Address') ?>2</th>
          <td><?= $this->escaper->escapeHtml($group->email2) ?></td>
          </tr>
<?php } ?>
<?php } ?>
          <tr>
          <th><?= $this->l10n->_('Updated at') ?></th>
          <td><?= date($this->l10n->_('Y-m-d H:i:s'), strtotime($group->updated)) ?></td>
          </tr>
          </tbody>
          </table>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/groups/edit/' . $group->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

<?php if ($group->children->count() == 0) { ?>
            <?= $this->tag->linkTo(['servicer/groups/delete/' . $group->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left']) ?>

<?php } ?>
            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?= $this->l10n->_('Other Options') ?></button>
              <ul class="dropdown-menu">
<?php if ($group->layer == 1) { ?>
                <li><?= $this->tag->linkTo(['servicer/viewaccounts/show/' . $group->id, $this->l10n->_('VIEW Account')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/groups/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('New Area')]) ?></li>
<?php } ?>
<?php if ($group->layer == 2) { ?>
                <li><?= $this->tag->linkTo(['servicer/viewaccounts/show/' . $group->id, $this->l10n->_('VIEW Account')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/groups/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('New Endpoint')]) ?></li>
<?php } ?>
<?php if ($group->layer == 3) { ?>
                <li><?= $this->tag->linkTo(['servicer/recaccounts/show/' . $group->id, $this->l10n->_('REC Account')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/viewaccounts/show/' . $group->id, $this->l10n->_('VIEW Account')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/agentboxes/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('Add Agent')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/cameras/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('Add Camera')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/groups/network/' . $group->id, $this->l10n->_('Network Information')]) ?></li>
<?php } ?>
              </ul>
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
