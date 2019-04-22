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
    <h1><?php echo $this->l10n->_('Manage Products'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/products/index', $this->l10n->_('Manage Products'))); ?></li>
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
                <td><?php echo $this->escaper->escapeHtml($product->id); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Name'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($product->name); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('SalePrice'); ?></th>
                <td class="text-right"><?php echo number_format($product->price); ?> (&#8363;)</td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Wholesale Price'); ?></th>
                <td class="text-right"><?php echo number_format($product->wholesale_price); ?> (&#8363;)</td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Purchase Price (avg)'); ?></th>
                <td class="text-right"><?php echo number_format($product->purchase_price); ?> (¥)</td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Quantity'); ?></th>
                <td class="text-right"><?php echo $product->quantity; ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Unit'); ?></th>
                <td class="text-right"><?php echo $product->unit; ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Size'); ?></th>
                <td class="text-right"><?php echo $product->size; ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Type'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($product->category->name); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Brand'); ?></th>
                <td><?php echo $this->escaper->escapeHtml($product->brand->name); ?></td>
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
                <th><?php echo $this->l10n->_('Product Image'); ?></th>
                <td>
                  
                  <a href="#" class="pop">
                    <?php echo $this->utility->image($product->user_id, $product->id, $product->image, array('height:150px')); ?>
                  </a>
                </td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Remarks'); ?></th>
                <td><?php echo nl2br($product->remarks); ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Disabled'); ?></th>
                <td><?php if ($product->disabled == 1) { ?><?php echo $this->l10n->_('Disabled'); ?><?php } ?></td>
              </tr>
              <tr>
                <th><?php echo $this->l10n->_('Updated at'); ?></th>
                <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($product->updated)); ?></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-12">
            <canvas id="chart-price"></canvas>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->linkTo(array('manager/products/edit/' . $product->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit'), 'class' => 'btn btn-success pull-left')); ?>

          <?php echo $this->tag->linkTo(array('manager/products/delete/' . $product->id, $this->l10n->_('<i class="fa fa-trash"></i> Delete'), 'class' => 'btn btn-danger pull-left')); ?>

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
            <ul class="dropdown-menu">
              <li><?php echo $this->tag->linkTo(array('manager/products/new/', $this->l10n->_('New'))); ?></li>
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

  <script>
    $(function () {
      //
      var price_dt = [<?php echo $price_dt; ?>];
      var dataPrice = {
        labels: [
          <?php echo $price_lb; ?>
        ],
        datasets : [{
          label: 'Sale Price',
          data: price_dt,
          borderWidth: 2,
          backgroundColor: 'rgba(245,127,23,1)',
          borderColor: 'rgba(245,127,23,1)',
          pointRadius: 5,
          fill: false
        }]
      };
      var options = {
        responsive: true,
          tooltips: {
          mode: 'index',
            intersect: false,
            callbacks: {
            label: function (tooltipItems, data) {
              return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + '₫';
            },
            footer: function (tooltipItems, data) {
              return '^^';
            }
          }
        },
        hover: {
          mode: 'index',
            intersect: false
        },
        scales: {
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Price'
            },
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };
      var ctxPrice = document.getElementById('chart-price').getContext('2d');
      var chartPrice = new Chart(ctxPrice, {
        type: 'line',
        data: dataPrice,
        options: options
    });
      //
    });
  </script>

</body>
</html>
