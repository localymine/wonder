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
      <?php echo $this->tag->form(array('manager/products/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

      <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

      <div class="box-body">

        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Product Name'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="price" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('SalePrice'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <div class="input-group">
              <?php echo $this->tag->textField(array('price', 'class' => 'form-control')); ?>
              <span class="input-group-addon">&#8363;</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="wholesale_price" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Wholesale Price'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <div class="input-group">
              <?php echo $this->tag->textField(array('wholesale_price', 'class' => 'form-control')); ?>
              <span class="input-group-addon">&#8363;</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="purchase_price" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Purechase Price (avg)'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <div class="input-group">
              <?php echo $this->tag->textField(array('purchase_price', 'class' => 'form-control')); ?>
              <span class="input-group-addon">¥</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="unit" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Unit'); ?></label>
          <div class="col-xs-12 col-sm-2">
            <?php echo $this->tag->textField(array('unit', 'class' => 'form-control')); ?>
          </div>
        </div>

        <div class="form-group">
          <label for="size" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Size'); ?></label>
          <div class="col-xs-12 col-sm-2">
            <?php echo $this->tag->textField(array('size', 'class' => 'form-control')); ?>
          </div>
        </div>

        <div class="form-group">
          <label for="image" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Product Image'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->fileField(array('image', 'class' => 'form-control')); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="category_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Type'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('category_id', $categories, 'using' => array('id', 'name'), 'name' => 'category_id', 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="brand_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Brand'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('brand_id', $brands, 'using' => array('id', 'name'), 'name' => 'brand_id', 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3')); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

              </label>
            </div>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/products/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>

      <?php echo $this->tag->endForm(); ?>

    </div>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <?php echo $this->tag->javascriptInclude('js/other.js'); ?>
  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });
    });
  </script>

</body>
</html>
