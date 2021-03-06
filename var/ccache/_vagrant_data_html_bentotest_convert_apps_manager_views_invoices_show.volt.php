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
    <h1><?php echo $this->l10n->_('Manage Invoices'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/invoices/index', $this->l10n->_('Manage Invoices'))); ?></li>
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
            <td><?php echo $this->escaper->escapeHtml($invoice->id); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Client'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($invoice->client->name); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Total Price'); ?></th>
              <td class="text-right">
                <div class="input-group">
                  <?php echo number_format($invoice->total_price); ?>
                  <span class="input-group-addon">&#8363;</span>
                </div>
              </td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Delivery'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($deliver[$invoice->deliver]); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Status'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($status[$invoice->status]); ?></td>
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
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($invoice->remarks); ?></td>
            </tr>
            <tr>
              <th><?php echo $this->l10n->_('Disabled'); ?></th>
              <td><?php if ($invoice->disabled == 1) { ?><?php echo $this->l10n->_('Disabled'); ?><?php } ?></td>
            </tr>
            <tr>
            <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($invoice->updated)); ?></td>
            </tr>
            <?php if (isset($invoice->transportinvoice->transport_id)) { ?>
            <tr>
              <th>Link to Transport</th>
              <td>
               <?php echo $invoice->transportinvoice->transport->name; ?> <?php echo $this->tag->linkTo(array('/manager/transports/show/' . $invoice->transportinvoice->transport_id, '<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>', 'class' => 'client')); ?>
              </td>
            </tr>
            <?php } ?>
            </table>
          </div>
        </div>

        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-12">
            <h5 class="text-bold"><?php echo $this->l10n->_('Order list'); ?></h5>
            <h4 class="text-right">
              <div class="input-group">
                <?php echo number_format($invoice->total_price); ?>
                <span class="input-group-addon">&#8363;</span>
              </div>
            </h4>
            <?php if (isset($invoice_details)) { ?>
            <table class="table table-bordered">
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($invoice_details as $detail) { ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $this->escaper->escapeHtml($detail->product->name); ?></td>
                <td class="text-right"><?php echo number_format($detail->price); ?></td>
                <td class="text-right"><span style="float:left;font-size:10px;">x</span> <?php echo $detail->quantity; ?></td>
                <td class="text-right">
                  <div class="input-group">
                    <?php echo number_format(($detail->price * $detail->quantity)); ?>
                    <span class="input-group-addon">&#8363;</span>
                  </div>
                </td>
              </tr>
                <?php $i = $i + 1; ?>
              <?php } ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->linkTo(array('manager/invoices/edit/' . $invoice->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

          <?php echo $this->tag->linkTo(array('manager/invoices/delete/' . $invoice->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
            <ul class="dropdown-menu">
              <li><?php echo $this->tag->linkTo(array('manager/invoices/new/', $this->l10n->_('New'))); ?></li>
              <li><button class="btn text-center btn-yahoo btn-print" data-id="<?php echo $invoice->id; ?>" data-target="#bill-dialog" data-toggle="modal"><i class="fa fa-image"></i></button></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <?php echo $this->partial('partials/modal/bill'); ?>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <script>
  $(function() {
    $('.btn-print').on('click', function() {
      var post_data = {
        'id' : $(this).data('id')
      };
      $.ajax({
        url: '/manager/invoices/print',
        type:'POST',
        data:post_data,
        dataType:'json',
        async:true,
        cache:false
      }).done(function (data) {
        if (data['success'] === 1) {
          $('.tb-detail tbody').empty();
          $('.tb-detail tfoot .qty').html('');
          $('.tb-detail tfoot .sum').html('');
          $('.bill-num').html(data['id']);
          $('.client-name').html(data['client']);
          $('.buy-date').html(data['date']);
          var detail = data['detail'];
          for (var i=0; i<detail.length; i++) {
            var tr = '<tr>' +
              '<td>'+detail[i]['product']+'</td>' +
              '<td class="text-right">'+(detail[i]['price']).format()+'</td>' +
              '<td class="text-right">'+detail[i]['quantity']+'</td>' +
              '<td class="text-right">'+(detail[i]['total']).format()+'</td>' +
              '</tr>';
            $('.tb-detail tbody').append(tr);
          }
          $('.tb-detail tfoot .qty').html(data['qty']);
          $('.tb-detail tfoot .sum').html(data['sum'].format());
          $('.tb-detail tfoot .remarks').html(data['remarks']);
          //
          html2canvas(element, {
            onrendered: function (canvas) {
              $("#previewImage").empty().append(canvas);
              getCanvas = canvas;
            }
          });
        }
      });
    });
  });

  var element = document.getElementById('bill-holder');
  var getCanvas;
  $('#btn-download').on('click', function() {
    var r = Math.random().toString(36).substring(7);
    var imgageData = getCanvas.toDataURL('image/png');
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $('#btn-download').attr('download', r+'.png').attr('href', newData);
  });

  </script>

</body>
</html>
