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
      <h1><?php echo $this->l10n->_('Manage Groups'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/groups/index/' . $group->member_id, $this->l10n->_('Manage Groups'))); ?></li>
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
          <table class="table table-bordered">
          <colgroup>
          <col class="col-4">
          <col class="col-8">
          </colgroup>
          <tbody>
          <tr>
          <th><?php echo $this->l10n->_('Id'); ?></th>
          <td><?php echo $this->escaper->escapeHtml($group->id); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Member Name'); ?></th>
          <td><?php echo $this->tag->linkTo(array('servicer/members/show/' . $group->member->id, $this->escaper->escapeHtml($group->member->name), 'class' => 'silent')); ?></td>
          </tr>
<?php if ($group->layer == 1) { ?>
          <tr>
          <th><?php echo $this->l10n->_('Group root'); ?></th>
          <td><?php echo $this->escaper->escapeHtml($group->name); ?></td>
          </tr>
<?php } else { ?>
<?php if ($group->layer == 2) { ?>
          <tr>
          <th><?php echo $this->l10n->_('Group root'); ?></th>
          <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $group->parent->id, $this->escaper->escapeHtml($group->parent->name), 'class' => 'silent')); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Area'); ?></th>
          <td><?php echo $this->escaper->escapeHtml($group->name); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Sort order'); ?></th>
          <td><?php echo $this->escaper->escapeHtml($group->sort); ?></td>
          </tr>
<?php } ?>
<?php if ($group->layer == 3) { ?>
          <tr>
          <th><?php echo $this->l10n->_('Group root'); ?></th>
          <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $group->parent->parent->id, $this->escaper->escapeHtml($group->parent->parent->name), 'class' => 'silent')); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Area'); ?></th>
          <td><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $group->parent->id, $this->escaper->escapeHtml($group->parent->name), 'class' => 'silent')); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Endpoint'); ?></th>
          <td><?php echo $this->escaper->escapeHtml($group->name); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Sort order'); ?></th>
          <td><?php echo $this->escaper->escapeHtml($group->sort); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Email Address'); ?>1</th>
          <td><?php echo $this->escaper->escapeHtml($group->email1); ?></td>
          </tr>
          <tr>
          <th><?php echo $this->l10n->_('Email Address'); ?>2</th>
          <td><?php echo $this->escaper->escapeHtml($group->email2); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          <tr>
          <th><?php echo $this->l10n->_('Updated at'); ?></th>
          <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($group->updated)); ?></td>
          </tr>
          </tbody>
          </table>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('servicer/groups/edit/' . $group->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

<?php if ($group->children->count() == 0) { ?>
            <?php echo $this->tag->linkTo(array('servicer/groups/delete/' . $group->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

<?php } ?>
            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
              <ul class="dropdown-menu">
<?php if ($group->layer == 1) { ?>
                <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/show/' . $group->id, $this->l10n->_('VIEW Account'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/groups/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('New Area'))); ?></li>
<?php } ?>
<?php if ($group->layer == 2) { ?>
                <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/show/' . $group->id, $this->l10n->_('VIEW Account'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/groups/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('New Endpoint'))); ?></li>
<?php } ?>
<?php if ($group->layer == 3) { ?>
                <li><?php echo $this->tag->linkTo(array('servicer/recaccounts/show/' . $group->id, $this->l10n->_('REC Account'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/show/' . $group->id, $this->l10n->_('VIEW Account'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('Add Agent'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/cameras/new/' . $group->member_id . '/' . $group->id, $this->l10n->_('Add Camera'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/groups/network/' . $group->id, $this->l10n->_('Network Information'))); ?></li>
<?php } ?>
              </ul>
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
