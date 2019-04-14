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
      <?php echo $this->tag->form(array('manager/invoices/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

      <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

      <div class="box-body">

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Client'); ?></label>
          <div class="col-xs-12 col-sm-4">
            <div id="client_id" name="client_id"></div>
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Status'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('status', $status, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3')); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="total_price" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Total Price'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              <?php echo $this->tag->textField(array('total_price', 'class' => 'form-control text-right', 'readonly' => true)); ?>
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

      var source = [];
      var clients = eval('<?php echo $clients; ?>');
      for (var i=0; i<clients.length; i++) {
        var classes = clients[i].type == 1 ? 'text-bold fa fa-star' : '';
        var html = '<div tabIndex=0 data-id="'+ clients[i].id +'"><div class="'+classes+'">'+ clients[i].name +'</div></div>';
        source[i] = {html: html, title: clients[i].name};
      }
      // Create a jqxComboBox
      var timer;
      $("#client_id").jqxComboBox({source: source, width:298, height: 34}).on('change', function(e){
        var args = e.args;
        if (args) {
          if(args.item !== null) {
            var item = args.item;
            var id = $(item.html).data('id');
            clearTimeout(timer);
            timer = setTimeout(function(){$('input[name=client_id]').val(id);}, 500)
          }
        }
      });

    });
  </script>

</body>
</html>
