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
      <?php echo $this->tag->form(array('manager/invoices/save', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $invoice->user_id)); ?>
      <?php echo $this->tag->hiddenField(array('invoice_id', 'value' => $invoice->id)); ?>

      <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

      <div class="box-body">

        <div class="form-group required">
          <label for="id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('ID'); ?></label>
          <div class="col-xs-12 col-sm-2">
            <?php echo $this->tag->textField(array('id', 'class' => 'form-control text-right', 'readonly' => true, 'value' => $invoice->id)); ?>
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Client'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('client', $eclients, 'using' => array('id', 'name'), 'name' => 'client_id', 'class' => 'form-control selectpicker show-tick', 'disabled' => true, 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $invoice->client_id)); ?>
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Status'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('status', $status, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $invoice->status)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $invoice->remarks)); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php if ($invoice->disabled == 1) { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } else { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } ?>

              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="total_price" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Total Price'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              <?php echo $this->tag->textField(array('total_price', 'class' => 'form-control text-right', 'readonly' => true, 'value' => $invoice->total_price)); ?>
              <span class="input-group-addon">&#8363;</span>
            </div>
            <a class="text-black" href="#" data-target="#products-dialog" data-toggle="modal"><i class="fa fa-plus-circle"></i> <?php echo $this->l10n->_('Add products'); ?></a>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-sm-12">
            <table class="table table-responsive">
              <thead>
              <tr>
                <th><?php echo $this->l10n->__('ID'); ?></th>
                <th></th>
                <th><?php echo $this->l10n->_('Name'); ?></th>
                <th><?php echo $this->l10n->_('(&#8363;)'); ?></th>
                <th><?php echo $this->l10n->_('Qty.'); ?></th>
                <th><?php echo $this->l10n->_('W.'); ?></th>
                <th><i class="fa fa-cogs"></i></th>
              </tr>
              </thead>
              <tbody id="cart-list">
              <?php $i = 1; ?>
              <?php foreach ($invoice_detail as $detail) { ?>
                <tr>
                  <td class="no"><?php echo $i; ?></td>
                  <td class="" style="width:32px;">
                    <a href="javascript:voide(0)" class="pop">
                      <img class="img-responsive" src="/uploads/user/<?php echo $this->utility->str_pad($invoice->user_id); ?>/product/<?php echo $this->utility->str_pad($detail->product_id); ?>/<?php echo $detail->product->image; ?>" />
                    </a>
                  </td>
                  <td><?php echo $detail->product->name; ?></td>
                  <td class="text-right">
                    <input type="text" name="epd[<?php echo $i; ?>][price]" class="form-control text-right no-border price"
                           value="<?php echo $detail->price; ?>"/>
                  </td>
                  <td class="text-right">
                    <input type="number" name="epd<?php echo $i; ?>[quantity]" class="form-control text-right no-border quantity"
                           min="1" max="<?php echo $this->utility->getQuantity($invoice->user_id, $detail->product_id, $detail->warehouse->id); ?>" value="<?php echo $detail->quantity; ?>"/>
                  </td>
                  <td class="text-center"><?php echo $detail->warehouse->name; ?></td>
                  <td class="text-center">
                    <a class="subCart" href="javascript:void(0)" data-id="rs[<?php echo $i; ?>[id]" data-name="rs[<?php echo $i; ?>][name]"
                       data-whid="rs[<?php echo $i; ?>][warehouse_id]"><i class="fa text-red fa-minus-circle"></i></a>
                    <input type="hidden" name="epd[<?php echo $i; ?>][id]" value="<?php echo $detail->id; ?>"/>
                    <input type="hidden" class="warehouse" name="epd[<?php echo $i; ?>][warehouse]"
                           value="<?php echo $detail->warehouse->id; ?>"/>
                    <input type="hidden" class="product" name="epd[<?php echo $i; ?>][product]" value="<?php echo $detail->product_id; ?>"/>
                  </td>
                </tr>
                <?php $i = $i + 1; ?>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/invoices/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>

      <?php echo $this->tag->endForm(); ?>

    </div>

    <?php echo $this->partial('partials/modal/product-list'); ?>
    <?php echo $this->partial('partials/modal/image-enlarge'); ?>

  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <?php echo $this->tag->javascriptInclude('js/invoice.js'); ?>
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
