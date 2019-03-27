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
    <h1><?php echo $this->l10n->__('Manage Monitors', 'Monitor'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('servicer/monitors/index', $this->l10n->__('Manage Monitors', 'Monitor'))); ?></li>
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
                <td><?php echo $this->escaper->escapeHtml($monitor->id); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->__('Monitor Name', 'Monitor'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($monitor->name); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Member Name'); ?></th>
                <td><?php echo $this->tag->linkTo(array('servicer/members/show/' . $monitor->member->id, $this->escaper->escapeHtml($monitor->member->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Group root'); ?></th>
                <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $monitor->group->parent->parent->id, $this->escaper->escapeHtml($monitor->group->parent->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Area'); ?></th>
                <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $monitor->group->parent->id, $this->escaper->escapeHtml($monitor->group->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Endpoint'); ?></th>
                <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $monitor->group->id, $this->escaper->escapeHtml($monitor->group->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->__('Monitor Suspend', 'Monitor'); ?></th>
                <td>
                  <?php if ($monitor->disabled == 1) { ?>
                    <?php echo $this->l10n->_('Suspend'); ?>
                    <span class="modified-at"><?php echo sprintf($this->l10n->__('(modified at %s)', 'Audit'), $monitor->updated); ?></span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Remarks'); ?></th>
                <td><?php echo nl2br($this->escaper->escapeHtml($monitor->remarks)); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Updated at'); ?></th>
                <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($monitor->updated)); ?></td>
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
                <td><?php echo $this->escaper->escapeHtml($monitor->hwaddr); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('IP Address'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($monitor->ipaddr); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Netmask'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($monitor->netmask); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Gateway'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($monitor->gateway); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('DNS'); ?>1</th>
                <td><?php echo $this->escaper->escapeHtml($monitor->dns1); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('DNS'); ?>2</th>
                <td><?php echo $this->escaper->escapeHtml($monitor->dns2); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Firmware Version'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($monitor->firmver); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Connection status'); ?></th>
                <?php if ($monitor->disabled == 1) { ?>
                  <td><span class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Monitor'); ?></span></td>
                <?php } else { ?>
                  <td><span
                        class="stat-<?php echo $stat_class[$monitor->status]; ?>"><?php echo $this->l10n->__($stat_label[$monitor->status], 'Monitor'); ?></span>
                  </td>
                <?php } ?>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->linkTo(array('servicer/monitors/edit/' . $monitor->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

          <?php echo $this->tag->linkTo(array('servicer/monitors/delete/' . $monitor->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
            <ul class="dropdown-menu">
              <li><?php echo $this->tag->linkTo(array('servicer/monitors/settings/' . $monitor->member_id . '/' . $monitor->group_id . '/' . $monitor->id, $this->l10n->__('Setting Live Monitor', 'Monitor'))); ?></li>
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
