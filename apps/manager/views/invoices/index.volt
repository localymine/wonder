{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n.__('Manage Invoices','invoice') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/invoices/index', l10n.__('Manage Invoices','invoice')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output()| escape }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>

        {{ link_to('manager/invoices/new/',l10n._('<i class="fa fa-file"></i><span>New</span>'),'class':'btn btn-primary btn-sm xcenter') }}

        <button class="btn btn-default btn-sm xoutput" data-target="#invoices-export-dialog" data-toggle="modal">
          <i class="fa fa-file-excel-o"></i> <span>Export</span>
        </button>

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/invoices') }}
        {{ partial('partials/modal/bill') }}

      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
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
      $('.btn-delivery').live('click', function() {
        var me = $(this);
        var td = me.parent();
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
            switch (data['deliver']) {
              case 0:
                me.html('Shop');
                td.removeClass('Delivering Finished').addClass('Shop');
                break;
              case 1:
                me.html('Delivering');
                td.removeClass('Shop Finished').addClass('Delivering');
                break;
              case 2:
                me.html('Finished');
                td.removeClass('Shop Delivering').addClass('Finished');
                break;
            }
          }
        });
      });
      //
      $('.btn-status').live('click', function() {
        var me = $(this);
        var td = me.parent();
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
            switch (data['status']) {
              case 0:
                me.html('Unpaid');
                td.removeClass('Paid').addClass('Unpaid');
                break;
              case 1:
                me.html('Paid');
                td.removeClass('Unpaid').addClass('Paid');
                break;
            }
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
{% endblock %}
