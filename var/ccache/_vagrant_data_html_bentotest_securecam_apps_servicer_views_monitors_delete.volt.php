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
      <?php echo $this->tag->form(array('servicer/monitors/delete/' . $monitor->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

      <?php echo $this->tag->hiddenField(array('id', 'value' => $monitor->id)); ?>

      <?php echo $this->tag->hiddenField(array($this->security->getTokenKey(), 'value' => $this->security->getToken())); ?>

      <div class="box-body">

        <p class="lead text-red"><i class="fa fa-warning"></i> <?php echo $this->l10n->_('Delete Confirmation'); ?></p>
        <p><?php echo $this->l10n->_('Data will be deleted. This operation <strong>CANNOT be undone</strong>. Is it OK?'); ?></p>

        <table class="table table-bordered">
          <colgroup>
            <col class="col-4">
            <col class="col-8">
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
            <th><?php echo $this->l10n->_('Endpoint'); ?></th>
            <td><?php echo $this->escaper->escapeHtml($monitor->group->name); ?></td>
          </tr>
          <tr>
            <th><?php echo $this->l10n->_('HW Address'); ?></th>
            <td><?php echo $this->escaper->escapeHtml($monitor->hwaddr); ?></td>
          </tr>
          <tr>
            <th><?php echo $this->l10n->_('IP Address'); ?></th>
            <td><?php echo $this->escaper->escapeHtml($monitor->ipaddr); ?></td>
          </tr>
          <tr>
            <th><?php echo $this->l10n->_('Remarks'); ?></th>
            <td><?php echo nl2br($this->escaper->escapeHtml($monitor->remarks)); ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Delete'), 'class' => 'btn btn-danger')); ?>

          <?php echo $this->tag->linkTo(array('servicer/monitors/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>
      <?php echo $this->tag->endForm(); ?>

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
