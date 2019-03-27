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
        <?= $this->tag->form(['servicer/members/delete/' . $member->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['id', 'value' => $member->id]) ?>

        <?= $this->tag->hiddenField([$this->security->getTokenKey(), 'value' => $this->security->getToken()]) ?>

        <div class="box-body">

          <p class="lead text-red"><i class="fa fa-warning"></i> <?= $this->l10n->_('Delete Confirmation') ?></p>
          <p><?= $this->l10n->_('Data will be deleted. This operation <strong>CANNOT be undone</strong>. Is it OK?') ?></p>

          <table class="table table-bordered">
          <colgroup>
          <col class="col-4">
          <col class="col-8">
          </colgroup>
          <tbody>
          <tr>
          <th><?= $this->l10n->_('Id') ?></th>
          <td><?= $this->escaper->escapeHtml($member->id) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Membergroup Name') ?></th>
          <td><?= $this->escaper->escapeHtml($member->name) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Customer #') ?></th>
          <td><?= $this->l10n->_('company:') ?>:<?= $this->escaper->escapeHtml($member->ccode) ?>&emsp;&emsp;<?= $this->l10n->_('branch:') ?>:<?= $this->escaper->escapeHtml($member->ocode) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Contract #') ?></th>
          <td><?= $this->escaper->escapeHtml($member->mcode) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Payment type') ?></th>
          <td><?php if ($member->paymethod == 0) { ?><?= $this->l10n->__('Monthly payment', 'Member') ?><?php } ?>
              <?php if ($member->paymethod == 1) { ?><?= $this->l10n->__('Bulk payment', 'Member') ?><?php } ?></td>
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
          </tbody>
          </table>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Delete'), 'class' => 'btn btn-danger']) ?>

            <?= $this->tag->linkTo(['servicer/membergroups/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

          </div>
        </div>
        <?= $this->tag->endForm() ?>

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
