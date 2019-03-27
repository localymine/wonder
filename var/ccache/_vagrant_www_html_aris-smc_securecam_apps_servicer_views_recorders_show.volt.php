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
      <h1><?= $this->l10n->_('Manage Recorders') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/recorders/index', $this->l10n->_('Manage Recorders')]) ?></li>
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
          <div class="row row-gutter-20">
            <div class="col-xs-12 col-sm-6">
              <table class="table table-bordered">
              <colgroup>
              <col class="col-5">
              <col class="col-7">
              </colgroup>
              <tbody>
              <tr>
              <th><?= $this->l10n->_('Id') ?></th>
              <td><?= $this->escaper->escapeHtml($recorder->id) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Recorder Name') ?></th>
              <td><?= $this->escaper->escapeHtml($recorder->name) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Member Name') ?></th>
              <td><?= $this->tag->linkTo(['servicer/members/show/' . $recorder->member->id, $this->escaper->escapeHtml($recorder->member->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Group root') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $recorder->group->parent->parent->id, $this->escaper->escapeHtml($recorder->group->parent->parent->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Area') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $recorder->group->parent->id, $this->escaper->escapeHtml($recorder->group->parent->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Endpoint') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $recorder->group->id, $this->escaper->escapeHtml($recorder->group->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Temporarily suspend agent process on the server') ?></th>
              <td><?php if ($recorder->disabled == 1) { ?><?= $this->l10n->_('Suspend') ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Remarks') ?></th>
              <td><?= nl2br($this->escaper->escapeHtml($recorder->remarks)) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Updated at') ?></th>
              <td><?= date($this->l10n->_('Y-m-d H:i:s'), strtotime($recorder->updated)) ?></td>
              </tr>
              </tbody>
              </table>
            </div>
            <div class="col-xs-12 col-sm-6">
              <table class="table table-bordered">
              <colgroup>
              <col class="col-5">
              <col class="col-7">
              </colgroup>
              <tbody>
              <tr>
              <th><?= $this->l10n->_('Agentbox Name') ?></th>
              <td><?php if ($recorder->agentbox_id > 0) { ?><?= $this->tag->linkTo(['servicer/agentboxes/show/' . $recorder->agentbox->id, $this->escaper->escapeHtml($recorder->agentbox->name), 'class' => 'silent']) ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('IP Address') ?></th>
              <td><?= $this->escaper->escapeHtml($recorder->ipaddr) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('HW Address') ?></th>
              <td><?= $this->escaper->escapeHtml($recorder->hwaddr) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Manufacturer') ?></th>
              <td><?= $this->escaper->escapeHtml($recorder->manufacturer) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Model Name') ?></th>
              <td><?= $this->escaper->escapeHtml($recorder->model) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Life-Or-Death') ?></th>
<?php if ($recorder->disabled == 1) { ?>
              <td><span class="stat-paused"><?= $this->l10n->__('Suspended', 'Recorder') ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?= $doa_class[$recorder->status] ?>"><?= $this->l10n->__($doa_label[$recorder->status], 'Recorder') ?></span></td>
<?php } ?>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/recorders/edit/' . $recorder->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

            <?= $this->tag->linkTo(['servicer/recorders/delete/' . $recorder->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left']) ?>

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
