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
      <h1><?= $this->l10n->_('Manage Cameras') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/cameras/index', $this->l10n->_('Manage Cameras')]) ?></li>
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
              <td><?= $this->escaper->escapeHtml($camera->id) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Camera Name') ?></th>
              <td><span class="motion-enable<?php if ($camera->motion == 1) { ?> enabled<?php } ?>"></span><?= $this->escaper->escapeHtml($camera->name) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Unique id') ?></th>
              <td><?= $this->escaper->escapeHtml($camera->uniquekey) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Member Name') ?></th>
              <td><?= $this->tag->linkTo(['servicer/members/show/' . $camera->member->id, $this->escaper->escapeHtml($camera->member->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Group root') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $camera->group->parent->parent->id, $this->escaper->escapeHtml($camera->group->parent->parent->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Area') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $camera->group->parent->id, $this->escaper->escapeHtml($camera->group->parent->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Endpoint') ?></th>
              <td><?= $this->tag->linkTo(['servicer/groups/show/' . $camera->group->id, $this->escaper->escapeHtml($camera->group->name), 'class' => 'silent']) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Temporarily suspend agent process on the server') ?></th>
              <td><?php if ($camera->disabled == 1) { ?><?= $this->l10n->_('Suspend') ?><?php } ?>
                  <?php if (isset($audit)) { ?><span class="modified-at"><?= sprintf($this->l10n->__('(modified at %s)', 'Audit'), $audit->created) ?></span><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Surveil camera') ?></th>
              <td><?php if ($camera->surveil == 1) { ?><?= $this->l10n->_('Surveil this Camera') ?><?php } ?></td>
              </tr>
              <?php if ($camera->surveil == 1) { ?>
              <tr>
              <th><?= $this->l10n->_('Mail transfer detection') ?></th>
              <td><?= $camera->detect_interval . ' ' . $this->l10n->_('mins') ?></td>
              </tr>
              <?php } ?>
              <tr>
              <th><?= $this->l10n->_('Remarks') ?></th>
              <td><?= nl2br($this->escaper->escapeHtml($camera->remarks)) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Updated at') ?></th>
              <td><?= date($this->l10n->_('Y-m-d H:i:s'), strtotime($camera->updated)) ?></td>
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
              <th><?= $this->l10n->_('Basic Course') ?></th>
              <td><?php foreach ($courses as $c) { ?><?php if ($c->value == $camera->course) { ?><?= $c->name ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Bit rate') ?></th>
              <td><?php foreach ($bitrates as $b) { ?><?php if ($b->value == $camera->bitrate) { ?><?= $b->name ?> <?= $this->l10n->_('[kbps]') ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Preserve') ?></th>
              <td><?php foreach ($preserves as $p) { ?><?php if ($p->value == $camera->preserve) { ?><?= $p->name ?> <?= $this->l10n->_('[days]') ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Agentbox Name') ?></th>
              <td><?php if ($camera->agentbox_id > 0) { ?><?= $this->tag->linkTo(['servicer/agentboxes/show/' . $camera->agentbox->id, $this->escaper->escapeHtml($camera->agentbox->name), 'class' => 'silent']) ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('IP Address') ?></th>
              <td><?= $this->escaper->escapeHtml($camera->ipaddr) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('HW Address') ?></th>
              <td><?= $this->escaper->escapeHtml($camera->hwaddr) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Type of Camera') ?></th>
              <td><?php foreach ($cameratypes as $t) { ?><?php if ($t->value == $camera->type) { ?><?= $t->name ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Manufacturer') ?></th>
              <td><?= $this->escaper->escapeHtml($camera->manufacturer) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Model Name') ?></th>
              <td><?= $this->escaper->escapeHtml($camera->model) ?></td>
              </tr>
<?php if ($camera->live == 1) { ?>
              <tr>
              <th><?= $this->l10n->_('Live Port') ?></th>
              <td><?= $this->escaper->escapeHtml($camera->port) ?></td>
              </tr>
<?php } ?>
              <tr>
              <th><?= $this->l10n->_('Process status') ?></th>
<?php if ($camera->disabled == 1) { ?>
              <td><span class="stat-paused"><?= $this->l10n->__('Suspended', 'Camera') ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?= $stat_class[$camera->status] ?>"><?= $this->l10n->__($stat_label[$camera->status], 'Camera') ?></span></td>
<?php } ?>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/cameras/edit/' . $camera->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

            <?= $this->tag->linkTo(['servicer/cameras/delete/' . $camera->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left']) ?>

<?php if ($camera->live == 1) { ?>
            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?= $this->l10n->_('Other Options') ?></button>
              <ul class="dropdown-menu">
                <li><?= $this->tag->linkTo(['servicer/cameras/livesetup/' . $camera->id, $this->l10n->_('Liveview setting')]) ?></li>
              </ul>
            </div>
<?php } ?>
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
