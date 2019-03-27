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
      <h1><?php echo $this->l10n->_('Vendor Options'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/vendoroptions/index', $this->l10n->_('Vendor Options'))); ?></li>
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
          <col>
          </colgroup>
          <tbody>
          <tr>
          <td><?php echo $this->l10n->_('Member Name'); ?></td>
          <td><?php echo $this->escaper->escapeHtml($member->name); ?></td>
          </tr>
          </tbody>
          </table>

          <table class="table table-bordered table-condenced vendors-list">
          <caption><span class="pull-left"><?php echo $this->l10n->_('Member Vendor Options'); ?></span><?php if (isset($licenses)) { ?><?php echo $this->tag->linkTo(array('servicer/vendoroptions/new/' . $member->id, $this->l10n->__('Add Option', 'Vendoroption'), 'class' => 'btn btn-primary btn-xs pull-left')); ?><?php } ?></caption>
          <colgroup>
          <col class="col-5">
          <col class="col-5">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->_('Option Name'); ?></th>
          <th><?php echo $this->l10n->_('Option For'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php $vos = 0; ?>
<?php if (isset($licenses)) { ?>
<?php foreach ($licenses as $lic) { ?>
<?php if (!(empty($lic->vendoroption))) { ?>
<?php $vos += 1; ?>
          <tr>
          <td><?php foreach ($vendors as $v) { ?><?php if ($v->value == $lic->vendor) { ?><?php echo $lic->vendoroption->name; ?><?php } ?><?php } ?></td>
          <td><?php foreach ($vendors as $v) { ?><?php if ($v->value == $lic->vendor) { ?><?php echo $v->name; ?><?php } ?><?php } ?></td>
<?php if ($lic->vendor == 2) { ?>
          <td><?php echo $this->tag->linkTo(array('servicer/pluginfieldanalyst/show/' . $lic->id, $this->l10n->_('<i class="fa fa-eye"></i>'), 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/vendoroptions/edit/' . $lic->vendoroption->id, $this->l10n->_('<i class="fa fa-pencil"></i>'), 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/vendoroptions/delete/' . $lic->id, $this->l10n->_('<i class="fa fa-trash"></i>'), 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
<?php } else { ?>
          <td><?php echo $this->tag->linkTo(array('servicer/vendoroptions/delete/' . $lic->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
<?php } ?>
          </tr>
<?php } ?>
<?php } ?>
<?php } ?>
<?php if ($vos == 0) { ?>
          <tr>
          <td class="text-center"><?php echo $this->l10n->_('The Member has no Available Vendor Options.'); ?></td>
          <td></td>
          <td></td>
          </tr>
<?php } ?>
          </tbody>
          </table>


          <table class="table table-bordered table-condenced licenses-list">
          <caption><span class="pull-left"><?php echo $this->l10n->_('Member Licenses'); ?></span><?php echo $this->tag->linkTo(array('servicer/vendoroptions/newlic/' . $member->id, $this->l10n->__('Add License', 'Vendoroption'), 'class' => 'btn btn-primary btn-xs pull-left')); ?></caption>
          <colgroup>
          <col class="col-5">
          <col class="col-5">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->_('License For'); ?></th>
          <th><?php echo $this->l10n->_('License No.'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($licenses)) { ?>
<?php foreach ($licenses as $lic) { ?>
          <tr>
          <td><?php foreach ($vendors as $v) { ?><?php if ($v->value == $lic->vendor) { ?><?php echo $v->name; ?><?php } ?><?php } ?></td>
          <td class="monospaced"><?php echo $lic->uuid; ?></td>
          <td><?php echo $this->tag->linkTo(array('servicer/vendoroptions/expire/' . $lic->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } else { ?>
          <tr>
          <td class="text-center"><?php echo $this->l10n->_('The Member has no Available Licenses.'); ?></td>
          <td></td>
          <td></td>
          </tr>
<?php } ?>
          </tbody>
          </table>

        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('servicer/vendoroptions/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>
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
