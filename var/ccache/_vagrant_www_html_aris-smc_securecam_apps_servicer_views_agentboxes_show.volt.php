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
              <td><?= $this->escaper->escapeHtml($agentbox->id) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Agentbox Name') ?></th>
              <td><?= $this->escaper->escapeHtml($agentbox->name) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Member Name') ?></th>
              <td><?= $this->tag->linkTo(['servicer/members/show/' . $agentbox->member->id, $this->escaper->escapeHtml($agentbox->member->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Group root') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $agentbox->group->parent->parent->id, $this->escaper->escapeHtml($agentbox->group->parent->parent->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Area') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $agentbox->group->parent->id, $this->escaper->escapeHtml($agentbox->group->parent->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Endpoint') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $agentbox->group->id, $this->escaper->escapeHtml($agentbox->group->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Temporarily suspend agent process on the server') ?></th>
              <td><?php if ($agentbox->disabled == 1) { ?><?= $this->l10n->_('Suspend') ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Surveil agentbox') ?></th>
              <td><?php if ($agentbox->surveil == 1) { ?><?= $this->l10n->_('Surveil this Agentbox') ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Remarks') ?></th>
              <td><?= nl2br($this->escaper->escapeHtml($agentbox->remarks)) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Updated at') ?></th>
              <td><?= date($this->l10n->_('Y-m-d H:i:s'), strtotime($agentbox->updated)) ?></td>
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
              <th><?= $this->l10n->_('HW Address') ?></th>
              <td><?= $this->escaper->escapeHtml($agentbox->hwaddr) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('IP Address(static)') ?></th>
              <td><?= $this->escaper->escapeHtml($agentbox->ipaddr) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Netmask') ?></th>
              <td><?= $this->escaper->escapeHtml($agentbox->netmask) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Gateway') ?></th>
              <td><?= $this->escaper->escapeHtml($agentbox->gateway) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('DNS') ?>1</th>
              <td><?= $this->escaper->escapeHtml($agentbox->dns1) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('DNS') ?>2</th>
              <td><?= $this->escaper->escapeHtml($agentbox->dns2) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Firmware Version') ?></th>
              <td><?= $this->escaper->escapeHtml($agentbox->firmver) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Connection status') ?></th>
<?php if ($agentbox->disabled == 1) { ?>
              <td><span class="stat-paused"><?= $this->l10n->__('Suspended', 'Agentbox') ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?= $stat_class[$agentbox->status] ?>"><?= $this->l10n->__($stat_label[$agentbox->status], 'Agentbox') ?></span></td>
<?php } ?>
              </tr>
              <tr>
              <th><?= $this->l10n->_('External Memory') ?></th>
              <td><span class="stat-<?= $memstat_class[$agentbox->memstatus] ?>"><?= $this->l10n->_($memtype_label[$agentbox->memtype]) ?> ( <?= $this->l10n->__($memstat_label[$agentbox->memstatus], 'Agentbox') ?> )</span></td>
              </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/agentboxes/edit/' . $agentbox->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

            <?= $this->tag->linkTo(['servicer/agentboxes/delete/' . $agentbox->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left']) ?>

            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?= $this->l10n->_('Other Options') ?></button>
              <ul class="dropdown-menu">
                <li><?= $this->tag->linkTo(['servicer/agentboxes/arrangement/' . $agentbox->member_id, $this->l10n->_('Arrangement of Agentboxes')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/aboxoptions/account/' . $agentbox->id, $this->l10n->_('Account setting')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/aboxoptions/traffic/' . $agentbox->id, $this->l10n->_('Traffic control setting')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/aboxoptions/memory/' . $agentbox->id, $this->l10n->_('External memory setting')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/aboxoptions/ntp/' . $agentbox->id, $this->l10n->_('NTP setting')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/aboxoptions/logs/' . $agentbox->id, $this->l10n->_('Manage Logs')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/cameras/new/' . $agentbox->member_id . '/' . $agentbox->group_id . '/' . $agentbox->id, $this->l10n->_('Add Camera')]) ?></li>
              </ul>
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
