<?php echo $this->tag->getDoctype(); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?php echo $this->partial('partials/stylesheets'); ?>
<!--[if lt IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/html5shiv.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/respond.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/excanvas.js'); ?>
<![endif]-->
<!--[if gte IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/polyfill.min.js'); ?>
<![endif]-->
<?php echo $this->tag->getTitle(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?php echo $this->partial('partials/mainheader'); ?>
</header>

<aside class="main-sidebar">

<?php echo $this->partial('partials/sidebar'); ?>

</aside>

<div class="content-wrapper">

    <section class="content-header">
      <h1><?php echo $this->l10n->_('Manage Agentboxes'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/index', $this->l10n->_('Manage Agentboxes'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
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
              <th><?php echo $this->l10n->_('Id'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->id); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Agentbox Name'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Member Name'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/members/show/' . $agentbox->member->id, $this->escaper->escapeHtml($agentbox->member->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Group root'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $agentbox->group->parent->parent->id, $this->escaper->escapeHtml($agentbox->group->parent->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Area'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $agentbox->group->parent->id, $this->escaper->escapeHtml($agentbox->group->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Endpoint'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $agentbox->group->id, $this->escaper->escapeHtml($agentbox->group->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Temporarily suspend agent process on the server'); ?></th>
              <td><?php if ($agentbox->disabled == 1) { ?><?php echo $this->l10n->_('Suspend'); ?><?php } ?>
                  <?php if (isset($audit)) { ?><span class="modified-at"><?php echo sprintf($this->l10n->__('(modified at %s)', 'Audit'), $audit->created); ?></span><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Surveil agentbox'); ?></th>
              <td><?php if ($agentbox->surveil == 1) { ?><?php echo $this->l10n->_('Surveil this Agentbox'); ?><?php } ?></td>
              </tr>
              <?php if ($agentbox->surveil == 1) { ?>
              <tr>
                <th><?php echo $this->l10n->_('Mail transfer detection'); ?></th>
                <td><?php echo $agentbox->detect_interval . ' ' . $this->l10n->_('mins'); ?></td>
              </tr>
              <?php } ?>
              <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo nl2br($this->escaper->escapeHtml($agentbox->remarks)); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($agentbox->updated)); ?></td>
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
              <th><?php echo $this->l10n->_('HW Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->hwaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('IP Address(static)'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->ipaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Netmask'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->netmask); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Gateway'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->gateway); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('DNS'); ?>1</th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->dns1); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('DNS'); ?>2</th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->dns2); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Firmware Version'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->firmver); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Connection status'); ?></th>
<?php if ($agentbox->disabled == 1) { ?>
              <td><span class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Agentbox'); ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?php echo $stat_class[$agentbox->status]; ?>"><?php echo $this->l10n->__($stat_label[$agentbox->status], 'Agentbox'); ?></span></td>
<?php } ?>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('External Memory'); ?></th>
              <td><span class="stat-<?php echo $memstat_class[$agentbox->memstatus]; ?>"><?php echo $this->l10n->_($memtype_label[$agentbox->memtype]); ?> ( <?php echo $this->l10n->__($memstat_label[$agentbox->memstatus], 'Agentbox'); ?> )</span></td>
              </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('servicer/agentboxes/edit/' . $agentbox->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

            <?php echo $this->tag->linkTo(array('servicer/agentboxes/delete/' . $agentbox->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
              <ul class="dropdown-menu">
                <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/arrangement/' . $agentbox->member_id, $this->l10n->_('Arrangement of Agentboxes'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/aboxoptions/account/' . $agentbox->id, $this->l10n->_('Account setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/aboxoptions/traffic/' . $agentbox->id, $this->l10n->_('Traffic control setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/aboxoptions/memory/' . $agentbox->id, $this->l10n->_('External memory setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/aboxoptions/ntp/' . $agentbox->id, $this->l10n->_('NTP setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/aboxoptions/logs/' . $agentbox->id, $this->l10n->_('Manage Logs'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/cameras/new/' . $agentbox->member_id . '/' . $agentbox->group_id . '/' . $agentbox->id, $this->l10n->_('Add Camera'))); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>


</body>
</html>
