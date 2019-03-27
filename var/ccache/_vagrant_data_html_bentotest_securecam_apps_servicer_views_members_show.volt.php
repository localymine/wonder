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

    <section class="content-header" >
      <h1><?php echo $this->l10n->_('Manage Members'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/members/index', $this->l10n->_('Manage Members'))); ?></li>
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
              <td><?php echo $this->escaper->escapeHtml($member->id); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Member Name'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($member->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Membergroup'); ?></th>
              <td><?php if ($member->membergroup_id > 0) { ?><?php echo $this->tag->linkTo(array('servicer/membergroups/show/' . $member->membergroup->id, $member->membergroup->name, 'class' => 'silent')); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('DRM Optional usage'); ?></th>
              <td><?php if ($member->usedrm == 1) { ?><?php echo $this->l10n->__('Yes', 'DRM'); ?><?php } else { ?><?php echo $this->l10n->__('No', 'DRM'); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Subscribed'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d'), strtotime($member->joined)); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Suspend services'); ?></th>
              <td><?php if ($member->disabled == 1) { ?><?php echo $this->l10n->_('Suspend'); ?><?php } ?>
                  <?php if (isset($audit)) { ?><span class="modified-at"><?php echo sprintf($this->l10n->__('(modified at %s)', 'Audit'), $audit->created); ?></span><?php } ?></td>
              </tr>
              <tr>
              <tr>
              <th><?php echo $this->l10n->_('End of Withdraw Month/Year'); ?></th>
              <td><?php if ($member->withdraw != null) { ?><?php echo date($this->l10n->_('M Y'), strtotime($member->withdraw)); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Be suspended at'); ?></th>
              <td><?php if ($member->disableflg == 1) { ?><?php echo $this->l10n->_('End of Withdraw Month/Year'); ?><?php } ?>
                  <?php if ($member->disableflg == 2) { ?><?php echo $this->l10n->_('Immediately'); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo nl2br($this->escaper->escapeHtml($member->remarks)); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($member->updated)); ?></td>
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
              <th><?php echo $this->l10n->_('Customer #'); ?></th>
              <td><?php echo $this->l10n->_('company:'); ?>:<?php echo $this->escaper->escapeHtml($member->ccode); ?>&emsp;&emsp;<?php echo $this->l10n->_('branch:'); ?>:<?php echo $this->escaper->escapeHtml($member->ocode); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Contract #'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($member->mcode); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Sales type'); ?></th>
              <td><?php foreach ($salestypes as $s) { ?><?php if ($s->value == $member->sales) { ?><?php echo $this->escaper->escapeHtml($s->name); ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Payment type'); ?></th>
              <td><?php if ($member->paymethod == 1) { ?><?php echo $this->l10n->__('Bulk payment', 'Member'); ?><?php } ?>
                  <?php if ($member->paymethod == 2) { ?><?php echo $this->l10n->__('Monthly payment', 'Member'); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Person Name in charge'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($member->parsonname); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Email Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($member->email); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Phone'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($member->phone); ?></td>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('servicer/members/edit/' . $member->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

            <?php echo $this->tag->linkTo(array('servicer/members/delete/' . $member->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
              <ul class="dropdown-menu">
                <li><?php echo $this->tag->linkTo(array('servicer/groups/index/' . $member->id, $this->l10n->_('Manage Groups'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/surveils/show/' . $member->id, $this->l10n->_('Surveils'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/recaccounts/arrangement/' . $member->id, $this->l10n->_('REC Accounts'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/arrangement/' . $member->id, $this->l10n->_('VIEW Accounts'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/index', $this->l10n->_('List Agentboxes'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/cameras/index', $this->l10n->_('List Cameras'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/vendoroptions/show/' . $member->id, $this->l10n->_('Vendor Options Summary'))); ?></li>
                <li class="divider"></li>
                <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/new/' . $member->id, $this->l10n->_('Add New Agentbox'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('servicer/cameras/new/' . $member->id, $this->l10n->_('Add New Camera'))); ?></li>
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
