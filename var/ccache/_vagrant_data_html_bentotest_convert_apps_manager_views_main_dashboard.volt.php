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
    <h1><?php echo $this->escaper->escapeHtml($page_heading); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->flash->output(); ?>
    <div class="row">
      <div class="col-xs-12 col-sm-9">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left"><?php echo $this->l10n->_('Products need to order right now'); ?></h3>
          </div>
          <div class="box-body">
            <div class="low-inventory">
              <table class="table table-responsive">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product) { ?>
                  <tr>
                    <td><?php echo $product->id; ?></td>
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
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left"><?php echo $this->l10n->_('Servicer Profile'); ?></h3>
          </div>
          <div class="box-body">
            <dl class="prof">
              <dt><?php echo $this->l10n->_('Manager Name'); ?></dt>
              <dd><?php echo $this->escaper->escapeHtml($user->name); ?></dd>
              <dt><?php echo $this->l10n->_('Role'); ?></dt>
              <dd><?php echo $this->escaper->escapeHtml($user->role->name); ?></dd>
              <dt><?php echo $this->l10n->_('Email Address'); ?></dt>
              <dd><?php echo $this->escaper->escapeHtml($user->email); ?></dd>
            </dl>
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

  <?php echo $this->partial('partials/paginatorscript'); ?>

</body>
</html>
