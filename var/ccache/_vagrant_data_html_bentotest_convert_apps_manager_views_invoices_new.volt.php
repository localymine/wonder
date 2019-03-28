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
          <div class="col-xs-12 col-sm-3">
            

            <div id="client_id" name="client_id"></div>
          </div>
        </div>

        <div class="form-group">
          <label for="total_price" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Total Price'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              <?php echo $this->tag->textField(array('total_price', 'class' => 'form-control text-right', 'disabled' => true)); ?>
              <span class="input-group-addon">&#8363;</span>
            </div>
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

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Order Lists'); ?></label>
          <div class="col-xs-12 col-sm-9">
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

  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

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
        var html = '<div tabIndex=0 data-id="'+ clients[i].id +'"><div>'+ clients[i].name +'</div></div>';
        source[i] = {html: html, title: clients[i].name};
      }
      // Create a jqxComboBox
      $("#client_id").jqxComboBox({source: source, height: 34}).on('change', function(e){
        var args = e.args;
        if (args) {
          if(args.item !== null) {
            var item = args.item;
            $('input[name=client_id]').val($(item.html).data('id'));
          }
        }
      });

      $('.quantity').on('keyup', function(e) {
        var v = $(this).val();
        var min = $(this).attr('min');
        var max = $(this).attr('max');
        if(v !== ''){
          if(parseInt(v) < parseInt(min)){
            $(this).val(min);
          }
          if(parseInt(v) > parseInt(max)){
            $(this).val(max);
          }
        }
      });

      $('#keyword').on('keyup', function() {
        var keyword = $(this).val();
        var post_data = {
          'keyword' : keyword
        };
        if (keyword.length > 2) {
          $.ajax({
            url: '/manager/invoices/getProduct',
            type:'POST',
            data:post_data,
            dataType:'json',
            async:true,
            cache:false
          }).done(function (data) {
            if (data['success'] === 1) {
              $('#product-list').empty();
              var rs = eval(data['data']);
              for (var i=0; i<rs.length; i++) {
                var template = '<tr id="p' + rs[i]['id'] + '">' +
                    '<td>' + rs[i]['id'] + '</td>' +
                    '<td class="" style="width:32px;">' +
                    '<a href="#" class="pop">' +
                    '<img class="img-responsive" src="/uploads/user/' + (rs[i]['id']).toString().padStart(7,0) + '/product/' + rs[i]['id'] + '/' + rs[i]['image'] + '" />' +
                    '</a>' +
                    '</td>' +
                    '<td>'+rs[i]['name']+'</td>' +
                    '<td class="text-right">' +
                    '<input type="text" name="pd['+i+'][price]" class="form-control text-right no-border price" value="'+rs[i]['price']+'" />' +
                    '</td>' +
                    '<td class="text-right">' +
                    '<input type="number" name="pd['+i+'][quantity]" class="form-control text-right no-border quantity" min="1" max="'+rs[i]['quantity']+'" value="1" />' +
                    '</td>' +
                    '<td class="text-center">'+rs[i]['warehouse']+'</td>' +
                    '<td class="text-center">' +
                    '<a class="addCart" href="#" data-id="'+rs[i]['id']+'" data-name="'+rs[i]['name']+'" data-whid="'+rs[i]['warehouse_id']+'"><i class="fa text-blue fa-plus-circle"></i></a>' +
                    '</td>' +
                    '</tr>';
                $('#product-list').append(template);
              }
              $('.quantity').on('keyup', function(e) {
                var v = $(this).val();
                var min = $(this).attr('min');
                var max = $(this).attr('max');
                if(v !== ''){
                  if(parseInt(v) < parseInt(min)){
                    $(this).val(min);
                  }
                  if(parseInt(v) > parseInt(max)){
                    $(this).val(max);
                  }
                }
              });
              $('.addCart').on('click', function() {
                var tr = $(this).parent().parent().clone();
                $('#cart-list').append(tr);
                $('a.addCart i',tr).removeClass('fa-plus-circle text-blue').addClass('fa-minus-circle text-red');
                $('a.addCart',tr).removeClass('addCart').addClass('subCart');
                $('#total_price').val(counter());
                //
                $('.subCart').on('click', function() {
                  var tr = $(this).parent().parent().remove();
                  $('#total_price').val(counter());
                });
              });
            }
          });
        }
      });

      function counter() {
        var total_price = 0;
        $('#cart-list tr').each(function() {
          var price = $('.price', this).val();
          var qty   = $('.quantity', this).val();
          total_price += price * qty;
        });
        return total_price;
      }

    });
  </script>

</body>
</html>
