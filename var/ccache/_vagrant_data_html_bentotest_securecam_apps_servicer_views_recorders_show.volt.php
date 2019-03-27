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
      <h1><?php echo $this->l10n->_('Manage Recorders'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/recorders/index', $this->l10n->_('Manage Recorders'))); ?></li>
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
              <td><?php echo $this->escaper->escapeHtml($recorder->id); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Recorder Name'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($recorder->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Member Name'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/members/show/' . $recorder->member->id, $this->escaper->escapeHtml($recorder->member->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Group root'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $recorder->group->parent->parent->id, $this->escaper->escapeHtml($recorder->group->parent->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Area'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $recorder->group->parent->id, $this->escaper->escapeHtml($recorder->group->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Endpoint'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $recorder->group->id, $this->escaper->escapeHtml($recorder->group->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Temporarily suspend agent process on the server'); ?></th>
              <td><?php if ($recorder->disabled == 1) { ?><?php echo $this->l10n->_('Suspend'); ?><?php } ?></td>
              </tr>
              <?php if ($recorder->disabled == 0) { ?>
              <tr>
                <th><?php echo $this->l10n->_('Mail transfer detection'); ?></th>
                <td><?php echo $recorder->detect_interval . ' ' . $this->l10n->_('mins'); ?></td>
              </tr>
              <?php } ?>
              <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo nl2br($this->escaper->escapeHtml($recorder->remarks)); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($recorder->updated)); ?></td>
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
              <th><?php echo $this->l10n->_('Agentbox Name'); ?></th>
              <td><?php if ($recorder->agentbox_id > 0) { ?><?php echo $this->tag->linkTo(array('servicer/agentboxes/show/' . $recorder->agentbox->id, $this->escaper->escapeHtml($recorder->agentbox->name), 'class' => 'silent')); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('IP Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($recorder->ipaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('HW Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($recorder->hwaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Manufacturer'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($recorder->manufacturer); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Model Name'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($recorder->model); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Life-Or-Death'); ?></th>
<?php if ($recorder->disabled == 1) { ?>
              <td><span class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Recorder'); ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?php echo $doa_class[$recorder->status]; ?>"><?php echo $this->l10n->__($doa_label[$recorder->status], 'Recorder'); ?></span></td>
<?php } ?>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('servicer/recorders/edit/' . $recorder->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

            <?php echo $this->tag->linkTo(array('servicer/recorders/delete/' . $recorder->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

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
