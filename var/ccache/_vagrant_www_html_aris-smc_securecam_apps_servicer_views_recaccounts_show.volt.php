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
      <h1><?= $this->l10n->_('Manage REC Accounts') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/recaccounts/index', $this->l10n->_('Manage REC Accounts')]) ?></li>
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
          <th><?= $this->l10n->_('Group') ?><?= $this->l10n->_('Id') ?></th>
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
          <th><?= $this->l10n->_('Area') ?></th>
          <td><?= $this->escaper->escapeHtml($group->name) ?></td>
          </tr>
<?php } ?>
<?php if ($group->layer == 3) { ?>
          <tr>
          <th><?= $this->l10n->_('Endpoint') ?></th>
          <td><?= $this->escaper->escapeHtml($group->name) ?></td>
          </tr>
<?php } ?>
<?php } ?>
          <tr>
          <th><?= $this->l10n->_('REC Server Address') ?></th>
          <td><?= $this->escaper->escapeHtml($group->cloudaddr) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('REC Server Directory') ?></th>
          <td><?= $this->escaper->escapeHtml($path_disp) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('REC Account Login') ?></th>
          <td><?= $this->escaper->escapeHtml($group->cloudlogin) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('REC Account Password') ?></th>
          <td><?= $this->escaper->escapeHtml($group->cloudpasswd) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Updated at') ?></th>
          <td><?= date($this->l10n->_('Y-m-d H:i:s'), strtotime($group->updated)) ?></td>
          </tr>
          </tbody>
          </table>
        </div>
        <div class="box-footer">
          <div class="action-area">
<?php if ($identity['role_id'] == 1) { ?>
            <?= $this->tag->linkTo(['servicer/recaccounts/edit/' . $group->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

<?php } ?>
            <?= $this->tag->linkTo(['servicer/recaccounts/arrangement/' . $group->member_id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default pull-left']) ?>

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
