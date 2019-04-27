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

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

<div class="wrapper">

<header class="main-header">
<?php echo $this->partial('partials/mainheader'); ?>
</header>

<aside class="main-sidebar">

<?php echo $this->partial('partials/sidebar'); ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?php echo $this->l10n->_('Manage Clients'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/clients/index', $this->l10n->_('Manage Client'))); ?></li>
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
            <td><?php echo $this->escaper->escapeHtml($client->id); ?></td>
            </tr>
            <tr>
            <th><?php echo $this->escaper->escapeHtml($type[$client->type]); ?> <?php echo $this->l10n->_('Name'); ?></th>
            <td><?php echo $this->escaper->escapeHtml($client->name); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Country'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->country->name); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Type'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($type[$client->type]); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Email'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->email); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Phone'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->phone); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Postal'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->postal); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->address); ?></td>
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
              <th><?php echo $this->l10n->_('Firstname'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->firstname); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Lastname'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($client->lastname); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo nl2br($client->remarks); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Disabled'); ?></th>
              <td><?php if ($client->disabled == 1) { ?><?php echo $this->l10n->_('Disabled'); ?><?php } ?></td>
            </tr>
            <tr>
            <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($client->updated)); ?></td>
            </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->linkTo(array('manager/clients/edit/' . $client->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

          <?php echo $this->tag->linkTo(array('manager/clients/delete/' . $client->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

        </div>
      </div>
    </div>

  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>


</body>
</html>
