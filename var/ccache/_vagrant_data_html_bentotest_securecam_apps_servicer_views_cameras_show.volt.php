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
      <h1><?php echo $this->l10n->_('Manage Cameras'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/cameras/index', $this->l10n->_('Manage Cameras'))); ?></li>
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
              <td><?php echo $this->escaper->escapeHtml($camera->id); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Camera Name'); ?></th>
              <td><span class="motion-enable<?php if ($camera->motion == 1) { ?> enabled<?php } ?>"></span><?php echo $this->escaper->escapeHtml($camera->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Unique id'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($camera->uniquekey); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Member Name'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/members/show/' . $camera->member->id, $this->escaper->escapeHtml($camera->member->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Group root'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $camera->group->parent->parent->id, $this->escaper->escapeHtml($camera->group->parent->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Area'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $camera->group->parent->id, $this->escaper->escapeHtml($camera->group->parent->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Endpoint'); ?></th>
              <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $camera->group->id, $this->escaper->escapeHtml($camera->group->name), 'class' => 'silent')); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Temporarily suspend agent process on the server'); ?></th>
              <td><?php if ($camera->disabled == 1) { ?><?php echo $this->l10n->_('Suspend'); ?><?php } ?>
                  <?php if (isset($audit)) { ?><span class="modified-at"><?php echo sprintf($this->l10n->__('(modified at %s)', 'Audit'), $audit->created); ?></span><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Surveil camera'); ?></th>
              <td><?php if ($camera->surveil == 1) { ?><?php echo $this->l10n->_('Surveil this Camera'); ?><?php } ?></td>
              </tr>
              <?php if ($camera->surveil == 1) { ?>
              <tr>
              <th><?php echo $this->l10n->_('Mail transfer detection'); ?></th>
              <td><?php echo $camera->detect_interval . ' ' . $this->l10n->_('mins'); ?></td>
              </tr>
              <?php } ?>
              <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo nl2br($this->escaper->escapeHtml($camera->remarks)); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($camera->updated)); ?></td>
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
              <th><?php echo $this->l10n->_('Basic Course'); ?></th>
              <td><?php foreach ($courses as $c) { ?><?php if ($c->value == $camera->course) { ?><?php echo $c->name; ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Bit rate'); ?></th>
              <td><?php foreach ($bitrates as $b) { ?><?php if ($b->value == $camera->bitrate) { ?><?php echo $b->name; ?> <?php echo $this->l10n->_('[kbps]'); ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Preserve'); ?></th>
              <td><?php foreach ($preserves as $p) { ?><?php if ($p->value == $camera->preserve) { ?><?php echo $p->name; ?> <?php echo $this->l10n->_('[days]'); ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Agentbox Name'); ?></th>
              <td><?php if ($camera->agentbox_id > 0) { ?><?php echo $this->tag->linkTo(array('servicer/agentboxes/show/' . $camera->agentbox->id, $this->escaper->escapeHtml($camera->agentbox->name), 'class' => 'silent')); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('IP Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($camera->ipaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('HW Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($camera->hwaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Type of Camera'); ?></th>
              <td><?php foreach ($cameratypes as $t) { ?><?php if ($t->value == $camera->type) { ?><?php echo $t->name; ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Manufacturer'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($camera->manufacturer); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Model Name'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($camera->model); ?></td>
              </tr>
<?php if ($camera->live == 1) { ?>
              <tr>
              <th><?php echo $this->l10n->_('Live Port'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($camera->port); ?></td>
              </tr>
<?php } ?>
              <tr>
              <th><?php echo $this->l10n->_('Process status'); ?></th>
<?php if ($camera->disabled == 1) { ?>
              <td><span class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Camera'); ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?php echo $stat_class[$camera->status]; ?>"><?php echo $this->l10n->__($stat_label[$camera->status], 'Camera'); ?></span></td>
<?php } ?>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('servicer/cameras/edit/' . $camera->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

            <?php echo $this->tag->linkTo(array('servicer/cameras/delete/' . $camera->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

<?php if ($camera->live == 1) { ?>
            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
              <ul class="dropdown-menu">
                <li><?php echo $this->tag->linkTo(array('servicer/cameras/livesetup/' . $camera->id, $this->l10n->_('Liveview setting'))); ?></li>
              </ul>
            </div>
<?php } ?>
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
