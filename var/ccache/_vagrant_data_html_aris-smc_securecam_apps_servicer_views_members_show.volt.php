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

    <section class="content-header" >
      <h1><?= $this->l10n->_('Manage Members') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/members/index', $this->l10n->_('Manage Members')]) ?></li>
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
              <td><?= $this->escaper->escapeHtml($member->id) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Member Name') ?></th>
              <td><?= $this->escaper->escapeHtml($member->name) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Membergroup') ?></th>
              <td><?php if ($member->membergroup_id > 0) { ?><?= $this->tag->linkTo(['servicer/membergroups/show/' . $member->membergroup->id, $member->membergroup->name, 'class' => 'silent']) ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('DRM Optional usage') ?></th>
              <td><?php if ($member->usedrm == 1) { ?><?= $this->l10n->__('Yes', 'DRM') ?><?php } else { ?><?= $this->l10n->__('No', 'DRM') ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Subscribed') ?></th>
              <td><?= date($this->l10n->_('Y-m-d'), strtotime($member->joined)) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Suspend services') ?></th>
              <td><?php if ($member->disabled == 1) { ?><?= $this->l10n->_('Suspend') ?><?php } ?>
                  <?php if (isset($audit)) { ?><span class="modified-at"><?= sprintf($this->l10n->__('(modified at %s)', 'Audit'), $audit->created) ?></span><?php } ?></td>
              </tr>
              <tr>
              <tr>
              <th><?= $this->l10n->_('End of Withdraw Month/Year') ?></th>
              <td><?php if ($member->withdraw != null) { ?><?= date($this->l10n->_('M Y'), strtotime($member->withdraw)) ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Be suspended at') ?></th>
              <td><?php if ($member->disableflg == 1) { ?><?= $this->l10n->_('End of Withdraw Month/Year') ?><?php } ?>
                  <?php if ($member->disableflg == 2) { ?><?= $this->l10n->_('Immediately') ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Remarks') ?></th>
              <td><?= nl2br($this->escaper->escapeHtml($member->remarks)) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Updated at') ?></th>
              <td><?= date($this->l10n->_('Y-m-d H:i:s'), strtotime($member->updated)) ?></td>
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
              <th><?= $this->l10n->_('Customer #') ?></th>
              <td><?= $this->l10n->_('company:') ?>:<?= $this->escaper->escapeHtml($member->ccode) ?>&emsp;&emsp;<?= $this->l10n->_('branch:') ?>:<?= $this->escaper->escapeHtml($member->ocode) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Contract #') ?></th>
              <td><?= $this->escaper->escapeHtml($member->mcode) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Sales type') ?></th>
              <td><?php foreach ($salestypes as $s) { ?><?php if ($s->value == $member->sales) { ?><?= $this->escaper->escapeHtml($s->name) ?><?php } ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Payment type') ?></th>
              <td><?php if ($member->paymethod == 1) { ?><?= $this->l10n->__('Bulk payment', 'Member') ?><?php } ?>
                  <?php if ($member->paymethod == 2) { ?><?= $this->l10n->__('Monthly payment', 'Member') ?><?php } ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Person Name in charge') ?></th>
              <td><?= $this->escaper->escapeHtml($member->parsonname) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Email Address') ?></th>
              <td><?= $this->escaper->escapeHtml($member->email) ?></td>
              </tr>
              <tr>
              <th><?= $this->l10n->_('Phone') ?></th>
              <td><?= $this->escaper->escapeHtml($member->phone) ?></td>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/members/edit/' . $member->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

            <?= $this->tag->linkTo(['servicer/members/delete/' . $member->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left']) ?>

            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?= $this->l10n->_('Other Options') ?></button>
              <ul class="dropdown-menu">
                <li><?= $this->tag->linkTo(['servicer/groups/index/' . $member->id, $this->l10n->_('Manage Groups')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/surveils/show/' . $member->id, $this->l10n->_('Surveils')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/recaccounts/arrangement/' . $member->id, $this->l10n->_('REC Accounts')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/viewaccounts/arrangement/' . $member->id, $this->l10n->_('VIEW Accounts')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/agentboxes/index', $this->l10n->_('List Agentboxes')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/cameras/index', $this->l10n->_('List Cameras')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/vendoroptions/show/' . $member->id, $this->l10n->_('Vendor Options Summary')]) ?></li>
                <li class="divider"></li>
                <li><?= $this->tag->linkTo(['servicer/agentboxes/new/' . $member->id, $this->l10n->_('Add New Agentbox')]) ?></li>
                <li><?= $this->tag->linkTo(['servicer/cameras/new/' . $member->id, $this->l10n->_('Add New Camera')]) ?></li>
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
