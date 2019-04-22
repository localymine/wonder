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
    <h1><?php echo $this->l10n->__('Manage Invoices', 'invoice'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/invoices/index', $this->l10n->__('Manage Invoices', 'invoice'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->escaper->escapeHtml($this->flash->output()); ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>

        <?php echo $this->tag->linkTo(array('manager/invoices/new/', $this->l10n->_('<i class="fa fa-file"></i><span>New</span>'), 'class' => 'btn btn-primary btn-sm xcenter')); ?>

        <button class="btn btn-default btn-sm xoutput" data-target="#invoices-export-dialog" data-toggle="modal">
          <i class="fa fa-file-excel-o"></i> <span>Export</span>
        </button>

      </div>
      <div class="box-body" data-csrftoken="<?php echo $this->security->getToken(); ?>">

        <?php echo $this->partial('partials/paginator/invoices'); ?>
        <?php echo $this->partial('partials/modal/bill'); ?>

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
  <script>
    $(function(){
      $('#table-invoices').DataTable({
//        "iDisplayLength": 50,
        "ordering": false,
        "bPaginate": false,
        "bInfo" : false
      });
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
      //
      $('.btn-delivery').on('click', function() {
        var me = $(this).parent();
        var post_data = {
          'id' : $(this).data('id')
        };
        $.ajax({
          url: '/manager/invoices/delivery',
          type:'POST',
          data:post_data,
          dataType:'json',
          async:true,
          cache:false
        }).done(function(data) {
          if (data['success'] === 1) {
            me.html('Finished');
            me.removeClass('Shop Delivering').addClass('Finished');
          }
        });
      });
      //
      $('.btn-status').on('click', function() {
        var me = $(this).parent();
        var post_data = {
          'id' : $(this).data('id')
        };
        $.ajax({
          url: '/manager/invoices/status',
          type:'POST',
          data:post_data,
          dataType:'json',
          async:true,
          cache:false
        }).done(function(data) {
          if (data['success'] === 1) {
            me.html('Paid');
            me.removeClass('Shop Delivering').addClass('Finished');
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

    Number.prototype.format = function(n, x) {
      var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
      return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    };
  </script>

</body>
</html>
