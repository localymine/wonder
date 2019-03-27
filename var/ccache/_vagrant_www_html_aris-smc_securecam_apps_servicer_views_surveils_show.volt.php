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
      <h1><?= $this->l10n->_('Surveils') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/surveils/index', $this->l10n->_('Surveils')]) ?></li>
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

          <div class="well well-small logmonitor">
            <ul>
<?php if (isset($notifies)) { ?>
<?php foreach ($notifies as $notify) { ?>
            <li><span class="pre"><?= date('Y-m-d H:i:s', $notify->created) ?></span><span class="pre">[<?= str_pad($notify->model, 10) ?>]</span><span><?= $this->escaper->escapeHtml($this->l10n->__($eventnames[$notify->type], 'Surveil')) ?></span></li>
<?php } ?>
<?php } else { ?>
            <li><?= $this->l10n->_('There is no Notifications.') ?></li>
<?php } ?>
            </ul>
          </div>

          <div class="collapse" id="surveiltable">
            <table class="table table-bordered table-condenced surveils-table">
            <caption><span class="pull-left"><?= $this->l10n->_('Detail of Surveils') ?></span><button type="button" class="btn btn-primary btn-xs pull-left" data-toggle="collapse" data-target="#surveiltable"><?= $this->l10n->_('Close') ?></button></caption>
            <colgroup>
            <col class="col-3">
            <col class="col-4">
            <col class="col-1">
            <col class="col-4">
            </colgroup>
            <thead>
            <tr>
            <th><?= $this->l10n->_('Monitor Devices') ?></th>
            <th><?= $this->l10n->_('Monitor Items') ?></th>
            <th><?= $this->l10n->_('Monitor Interval') ?></th>
            <th><?= $this->l10n->_('Monitor Conditions') ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td rowspan="3"><?= $this->l10n->_('Recording Server') ?></td>
            <td><?= $this->l10n->_('Uploading from camera has stopped') ?></td>
            <td>10 <?= $this->l10n->_('min.') ?></td>
            <td><?= $this->l10n->_('New files are not generated') ?></td>
            </tr>
            <tr>
            <td><?= $this->l10n->_('File uploads from unregistered camera') ?></td>
            <td>10 <?= $this->l10n->_('min.') ?></td>
            <td><?= $this->l10n->_('New file has generated') ?></td>
            </tr>
            <tr>
            <td><?= $this->l10n->_('Averaged bitrate has exceeded the value of the contract') ?></td>
            <td>10 <?= $this->l10n->_('min.') ?></td>
            <td><?= $this->l10n->_('The most recent of the file has exceeded the bitrate') ?></td>
            </tr>
            <tr>
            <td rowspan="3"><?= $this->l10n->_('Agentbox') ?></td>
            <td><?= $this->l10n->_('Uploading from camera has stopped') ?></td>
            <td>10 <?= $this->l10n->_('min.') ?></td>
            <td><?= $this->l10n->_('New files are not generated') ?></td>
            </tr>
            <tr>
            <td><?= $this->l10n->_('External memory is not available') ?></td>
            <td>10 <?= $this->l10n->_('min.') ?></td>
            <td><?= $this->l10n->_('External memory can not be written') ?></td>
            </tr>
            <tr>
            <td><?= $this->l10n->_('External memory usage exceedes the threshold') ?></td>
            <td>10 <?= $this->l10n->_('min.') ?></td>
            <td><?= $this->l10n->_('External memory usage has exceeded the threshold') ?></td>
            </tr>
            </tbody>
            </table>
          </div>

          <table class="table table-bordered">
          <caption><?= $this->l10n->_('Surveils Notification Settings') ?></caption>
          <colgroup>
          <col class="col-3">
          <col class="col-8">
          </colgroup>
          <tbody>
          <tr>
          <th><?= $this->l10n->_('Member Name') ?></td>
          <td><?= $this->tag->linkTo(['servicer/members/show/' . $member->id, $this->escaper->escapeHtml($member->name), 'class' => 'silent']) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Mail transmission frequency') ?></td>
          <td><?php if ($member->latency == 1) { ?><?= $this->l10n->_('Every 10 minutes (Includes detected/restored)') ?><?php } else { ?><?= $this->l10n->_('Just detected/restored only') ?><?php } ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Notification Receiver Address') ?>1</td>
          <td><?= $this->escaper->escapeHtml($member->urgentmail1) ?></td>
          </tr>
          <tr>
          <th><?= $this->l10n->_('Notification Receiver Address') ?>2</td>
          <td><?= $this->escaper->escapeHtml($member->urgentmail2) ?></td>
          </tr>
          </table>

        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/surveils/settings/' . $member->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left']) ?>

            <button type="button" class="btn btn-primary pull-left" data-toggle="collapse" data-target="#surveiltable"><?= $this->l10n->_('Detail of Surveils') ?></button>
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
