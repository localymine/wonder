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
    <h1><?php echo $this->l10n->_('Manage Transports'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/transports/index', $this->l10n->_('Manage Transports'))); ?></li>
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
            <td><?php echo $this->escaper->escapeHtml($transport->id); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Client'); ?></th>
              <td>
                <?php echo $this->escaper->escapeHtml($transport->client->name); ?>
                <?php echo $this->tag->linkTo(array('manager/clients/show/' . $transport->client_id, '<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>', 'class' => 'client')); ?>
              </td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Phone'); ?></th>
              <td>
                <?php echo $this->escaper->escapeHtml($transport->client->phone); ?>
              </td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Address'); ?></th>
              <td>
                <?php echo $this->escaper->escapeHtml($transport->client->address); ?>
              </td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Transport Issue'); ?></th>
              <td>
                <?php echo $this->escaper->escapeHtml($transport->name); ?>
              </td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Status'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($status[$transport->status]); ?></td>
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
              <th><?php echo $this->l10n->_('Total Invoices'); ?></th>
              <td class="text-right"><?php echo number_format($transport->total); ?> (&#8363;)</td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Total OtherCosts'); ?></th>
              <td class="text-right"><?php echo number_format($transport->total_others); ?> (&#8363;)</td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Total'); ?></th>
              <td class="text-right"><?php echo number_format(($transport->total + $transport->total_others)); ?> (&#8363;)</td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($transport->remarks); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Disabled'); ?></th>
              <td><?php if ($transport->disabled == 1) { ?><?php echo $this->l10n->_('Disabled'); ?><?php } ?></td>
            </tr>
            <tr>
            <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($transport->updated)); ?></td>
            </tr>
            </table>
          </div>
        </div>

        <h4><?php echo $this->l10n->_('Invoices'); ?></h4>
        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-6">
            <table class="table table-bordered">
              <colgroup>
                <col class="col-1">
                <col class="col-8">
                <col class="col-3">
              </colgroup>
              <tbody>
              <?php foreach ($transportInvoice as $transinvoice) { ?>
              <tr>
                <td><?php echo $transinvoice->invoice->id; ?></td>
                <td>
                  <i class="fa fa-glass"></i><?php echo $transinvoice->invoice->client->name; ?>
                  <?php echo $this->tag->linkTo(array('manager/invoices/show/' . $transinvoice->invoice->id, '<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>', 'class' => 'client')); ?>
                </td>
                <td class="text-right"><?php echo number_format($transinvoice->invoice->total_price); ?> (&#8363;)</td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <h4><?php echo $this->l10n->_('OtherCosts'); ?></h4>
        <div class="row row-gutter-20">
          <?php foreach ($transportOtherCost as $transothercost) { ?>
          <div class="col-xs-12 col-sm-6">
            <table class="table table-bordered">
              <colgroup>
                <col class="col-5">
                <col class="col-7">
              </colgroup>
              <tbody>
              <tr>
                <th class="font-light" style="padding-left:15px"><i class="fa fa-dot-circle-o"></i><?php echo $transothercost->name; ?></th>
                <td class="text-right">(¥) <?php echo number_format($transothercost->price); ?></td>
              </tr>
              </tbody>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->linkTo(array('manager/transports/edit/' . $transport->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

          <?php echo $this->tag->linkTo(array('manager/transports/delete/' . $transport->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
            <ul class="dropdown-menu">
              <li><?php echo $this->tag->linkTo(array('manager/transports/export/' . $transport->id, $this->l10n->_('Export CSV'))); ?></li>
            </ul>
          </div>

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
