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
      <?php echo $this->tag->form(array('manager/transports/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

      <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

      <div class="box-body">

        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Transport Name'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

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
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

              </label>
            </div>
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Client'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('client', $clients, 'using' => array('id', 'name'), 'name' => 'client_id', 'data-mode' => 'new', 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"></label>
          <div class="col-xs-12 col-sm-8">
            <a class="acond addInvoice" data-target="#invoicechooser" data-toggle="modal"><i class="fa fa-plus-circle"></i> <?php echo $this->l10n->_('Add Invoices'); ?></a>
            <?php echo $this->tag->hiddenField(array('count', 'value' => $count)); ?>
            <table class="table table-responsive lstChose">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"><?php echo $this->l10n->_('Invoice name', 'invoice'); ?></th>
                  <th class="text-center" scope="col"><?php echo $this->l10n->_('Price(¥)', 'invoice'); ?></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php echo $this->partial('partials/tr-invoices'); ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Other Costs'); ?></label>
        </div>

        <div class="form-group">
          <?php echo $this->tag->hiddenField(array('othercount', 'value' => $count)); ?>
          <ul class="ulcond lstcond">
            <?php echo $this->partial('partials/othersrow'); ?>
          </ul>
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-sm-9 col-sm-offset-3">
            <a class="acond addcond" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> <?php echo $this->l10n->_('Add'); ?></a>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->hiddenField(array('mode', 'value' => (isset($mode) ? $mode : 'new'))); ?>
          <?php echo $this->tag->hiddenField(array('choseInvoices', 'value' => $selected_invoice_ids)); ?>
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/transports/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>

      <?php echo $this->tag->endForm(); ?>

    </div>
  </section>

  <div class="modal" id="invoicechooser" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="invoiceModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 id="invoiceModalLabel" class="modal-title"><?php echo $this->l10n->_('Add Invices'); ?></h4>
        </div>
        <div class="modal-body">
          <ul class="ulcond lstInvoices">
            <?php echo $this->partial('partials/li-invoices-load'); ?>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary save-modal">Save changes</button>
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
      $.invoiceForm({
        addButton: "a.addcond",
        listCondition: "ul.lstcond",
        deleteButton: "a.deletecond",
        count: <?php echo $count; ?>
      });
    });
  </script>
  <?php echo $this->tag->javascriptInclude('js/transport.js'); ?>
  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });
      $('.modal-body ul li').on('click', function(evt) {
        $('input[type=checkbox]', this).iCheck('toggle');
      });

      $.transportForm({
        modal: "#invoicechooser",
        showButton: "a.addInvoice",
        saveButton: "button.save-modal",
        listItems: "ul.lstInvoices li"
      });

    });
  </script>

</body>
</html>
