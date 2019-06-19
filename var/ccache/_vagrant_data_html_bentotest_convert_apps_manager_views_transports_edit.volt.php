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
      <?php echo $this->tag->form(array('manager/transports/save', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>
      <?php echo $this->tag->hiddenField(array('transport_id', 'value' => $transport->id)); ?>

      <?php echo $this->tag->hiddenField(array('csrf', 'value' => $this->security->getToken())); ?>

      <div class="box-body">

        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Transport Issue'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'value' => $transport->name)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="flight_date" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Flight Date'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('flight_date', 'class' => 'form-control col-3', 'value' => $this->utility->substr($transport->flight_date, 0, 10))); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="flight_end" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Flight End'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('flight_end', 'class' => 'form-control col-3', 'value' => $this->utility->substr($transport->flight_end, 0, 10))); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Transporter'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('client', $clients, 'using' => array('id', 'name'), 'name' => 'client_id', 'data-mode' => 'new', 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $transport->client->id)); ?>
            
            

          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Status'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('status', $status, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $transport->status)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $transport->remarks)); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="send_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Sender'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('send_id', $sender, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $transport->send_id)); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="receive_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Receiver'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('receive_id', $receiver, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $transport->receive_id)); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php if ($transport->disabled == 1) { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } else { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } ?>

              </label>
            </div>
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
                <th class="text-center" scope="col"><?php echo $this->l10n->_('Price(&#8363;)', 'invoice'); ?></th>
                <th><?php echo $this->l10n->_('Datetime', 'invoice'); ?></th>
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
          <?php echo $this->tag->hiddenField(array('rmOtherIds')); ?>
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-sm-9 col-sm-offset-3">
            <a class="acond addcond" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> <?php echo $this->l10n->_('Add more condition'); ?></a>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Products Transportation'); ?></label>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"></label>
          <div class="col-xs-12 col-sm-8">
            <a class="acond addProducts" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> <?php echo $this->l10n->_('Add Products'); ?></a>
            <?php echo $this->tag->hiddenField(array('prtranscount', 'value' => $prtranscount)); ?>
            <table class="table table-responsive lstProducts">
              <thead>
              <tr>
                <th scope="col"><?php echo $this->l10n->_('Warehouse'); ?></th>
                <th scope="col"><?php echo $this->l10n->_('Product'); ?></th>
                <th class="text-center" scope="col"><?php echo $this->l10n->_('Amount'); ?></th>
                <th scope="col"></th>
              </tr>
              </thead>
              <tbody>
              <?php echo $this->partial('partials/tr-pr-trans-row'); ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/transports/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>

      <?php echo $this->tag->endForm(); ?>

    </div>
  </section>

  <?php echo $this->partial('partials/modal/transport-invoices-list'); ?>


</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <?php echo $this->tag->javascriptInclude('js/other.js'); ?>
  <script>
    WAREHOUSES = <?php echo json_encode($warehousesArr); ?>;
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
      //
      $('[name=flight_date],[name=flight_end]').datetimepicker({
        format: 'Y-MM-DD',
        useCurrent: true,
        dayViewHeaderFormat: "<?php echo $this->l10n->_('MMM YYYY'); ?>",
        tooltips: {
          today: "<?php echo $this->l10n->_('Select Today'); ?>",
          clear: "<?php echo $this->l10n->_('Deselect'); ?>",
          close: "<?php echo $this->l10n->_('Close'); ?>",
          selectMonth: "<?php echo $this->l10n->_('Select Month'); ?>",
          prevMonth: "<?php echo $this->l10n->_('Previous Month'); ?>",
          nextMonth: "<?php echo $this->l10n->_('Next Month'); ?>",
          selectYear: "<?php echo $this->l10n->_('Select Year'); ?>",
          prevYear: "<?php echo $this->l10n->_('Previous Year'); ?>",
          nextYear: "<?php echo $this->l10n->_('Next Year'); ?>"
        }
      });
    });
  </script>

</body>
</html>
