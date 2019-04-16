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
    <h1><?php echo $this->escaper->escapeHtml($page_heading); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->flash->output(); ?>

    <div class="row">

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left"><?php echo $this->l10n->_('List To Order'); ?></h3>
          </div>
          <div class="box-body">
            <div class="low-inventory">
              <table class="table table-responsive">
                <thead>
                <tr>
                  <th>ID</th>
                  <th style="width: 32px;"></th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product) { ?>
                  <tr>
                    <td><?php echo $product->id; ?></td>
                    <td>
                      <a href="javascript:void(0)" class="pop">
                        <?php echo $this->utility->image($product->user_id, $product->id, $product->image); ?>
                      </a>
                    </td>
                    <td><?php echo $this->escaper->escapeHtml($product->name); ?></td>
                    <td class="text-right"><?php echo number_format($product->price); ?></td>
                    <td class="text-right"><?php echo $product->quantity; ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-3">
        <div class="mb-max">
          <a href="/manager/brands/new" class="btn btn-lg btn-primary col-sm-12 col-xs-12">
            Brand
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/categories/new" class="btn btn-lg btn-primary col-md-12 col-xs-12">
            Category
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/clients/new" class="btn btn-lg btn-info col-md-12 col-xs-12">
            Client
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/members/new" class="btn btn-lg btn-info col-md-12 col-xs-12">
            Member
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-3">
        <div class="mb-max">
          <a href="/manager/invoices/new" class="btn btn-lg btn-danger col-sm-12 col-xs-12">
            Make Invoice
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/products/new" class="btn btn-lg btn-yahoo col-sm-12 col-xs-12">
            Product
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left"><?php echo $this->l10n->_('Favorite Products'); ?></h3>
          </div>
          <div class="box-body">
            <canvas id="the-most-order" width="400" height="400"></canvas>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left"><?php echo $this->l10n->_('Most interested'); ?></h3>
          </div>
          <div class="box-body">
            <canvas id="the-most-interested" width="400" height="400"></canvas>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left"><?php echo $this->l10n->_('Most Brandname'); ?></h3>
          </div>
          <div class="box-body">
            <canvas id="the-most-brandname" width="400" height="400"></canvas>
          </div>
        </div>
      </div>

    </div>

    <?php echo $this->partial('partials/modal/image-enlarge'); ?>

  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <?php echo $this->partial('partials/paginatorscript'); ?>
  <script>
    $(function () {
      var mOrder_dt = [<?php echo $mOrder_dt; ?>];
      var dataTheMostOrder = {
        labels: [
          <?php echo $mOrder_lb; ?>
        ],
        datasets : [{
          data: mOrder_dt,
          backgroundColor: palette('mpn65', mOrder_dt.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      };
      var ctxTheMostOrder = document.getElementById('the-most-order').getContext('2d');
      var chartTheMostOrder = new Chart(ctxTheMostOrder, {
        type: 'doughnut',
        data: dataTheMostOrder
      });
      //
      var mInterested_dt = [<?php echo $mInterested_dt; ?>];
      var dataTheMostInterested = {
        labels: [
          <?php echo $mInterested_lb; ?>
        ],
        datasets : [{
          data: mInterested_dt,
          backgroundColor: palette('mpn65', mInterested_dt.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      };
      var ctxTheMostInterested = document.getElementById('the-most-interested').getContext('2d');
      var chartTheMostInterested = new Chart(ctxTheMostInterested, {
        type: 'doughnut',
        data: dataTheMostInterested
      });
      //
      var mBrand_dt = [<?php echo $mBrand_dt; ?>];
      var dataTheMostBrand = {
        labels: [
          <?php echo $mBrand_lb; ?>
        ],
        datasets : [{
          data: mBrand_dt,
          backgroundColor: palette('mpn65', mBrand_dt.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      };
      var ctxTheMostBrand = document.getElementById('the-most-brandname').getContext('2d');
      var chartTheMostBrand = new Chart(ctxTheMostBrand, {
        type: 'doughnut',
        data: dataTheMostBrand
      });
      //
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');
      });
    });
  </script>

</body>
</html>
