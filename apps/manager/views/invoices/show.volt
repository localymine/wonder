{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
{{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Invoices') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/invoices/index', l10n._('Manage Invoices')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
{{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      <div class="box-body">
        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-6">
            <table class="table table-bordered">
            <colgroup>
            <col class="col-5">
            <col class="col-7">
            </colgroup>
            <tbody>
            <tr>
            <th>{{ l10n._('Id') }}</th>
            <td>{{ invoice.id|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Client') }}</th>
              <td>{{ invoice.client.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Total Price') }}</th>
              <td class="text-right">
                <div class="input-group">
                  {{ invoice.total_price|number_format }}
                  <span class="input-group-addon">&#8363;</span>
                </div>
              </td>
            </tr>
            <tr>
              <th>{{ l10n._('Delivery') }}</th>
              <td>{{ deliver[invoice.deliver]|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Status') }}</th>
              <td>{{ status[invoice.status]|e }}</td>
            </tr>
            </tbody>
            </table>
          </div>
          <div class="col-xs-12 col-sm-6">
            <table class="table table-bordered">
            <colgroup>
            <col class="col-5">
            <col class="col-7">
            </colgroup>
            <tbody>
            <tr>
              <th>{{ l10n._('Remarks') }}</th>
              <td>{{ invoice.remarks|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Disabled') }}</th>
              <td>{% if invoice.disabled == 1 %}{{ l10n._('Disabled') }}{% endif %}</td>
            </tr>
            <tr>
            <tr>
              <th>{{ l10n._('Updated at') }}</th>
              <td>{{ date(l10n._('Y-m-d H:i:s'), invoice.updated|strtotime) }}</td>
            </tr>
            {% if invoice.transportinvoice.transport_id is defined %}
            <tr>
              <th>Link to Transport</th>
              <td>
               {{ invoice.transportinvoice.transport.name }} {{ link_to('/manager/transports/show/'~invoice.transportinvoice.transport_id, '<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>', 'class':'client') }}
              </td>
            </tr>
            {% endif %}
            </table>
          </div>
        </div>

        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-12">
            <h5 class="text-bold">{{ l10n._('Order list') }}</h5>
            <h4 class="text-right">
              <div class="input-group">
                {{ invoice.total_price|number_format }}
                <span class="input-group-addon">&#8363;</span>
              </div>
            </h4>
            {% if invoice_details is defined %}
            <table class="table table-bordered">
              <tbody>
              {% set i = 1 %}
              {% for detail in invoice_details %}
              <tr>
                <td>{{ i }}</td>
                <td>{{ detail.product.name|e }}</td>
                <td class="text-right">{{ detail.price|number_format }}</td>
                <td class="text-right"><span style="float:left;font-size:10px;">x</span> {{ detail.quantity }}</td>
                <td class="text-right">
                  <div class="input-group">
                    {{ (detail.price * detail.quantity)|number_format }}
                    <span class="input-group-addon">&#8363;</span>
                  </div>
                </td>
              </tr>
                {% set i = i + 1 %}
              {% endfor %}
              </tbody>
            </table>
            {% endif %}
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          {{ link_to('manager/invoices/edit/'~invoice.id,l10n._('<i class="fa fa-pencil"></i> Edit'),'class':'btn btn-success pull-left') }}

          {{ link_to('manager/invoices/delete/'~invoice.id,l10n._('<i class="fa fa-trash"></i> Delete'),'class':'btn btn-danger pull-left') }}

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cogs"></i> {{ l10n._('Other Options') }}</button>
            <ul class="dropdown-menu">
              <li>{{ link_to('manager/invoices/new/',l10n._('New')) }}</li>
              <li><button class="btn text-center btn-yahoo btn-print" data-id="{{ invoice.id }}" data-target="#bill-dialog" data-toggle="modal"><i class="fa fa-image"></i></button></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    {{ partial('partials/modal/bill') }}
  </section>
{% endblock %}

{% block pagescript %}
  <script>
  $(function() {
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
  });

  var element = document.getElementById('bill-holder');
  var getCanvas;
  $('#btn-download').on('click', function() {
    var r = Math.random().toString(36).substring(7);
    var imgageData = getCanvas.toDataURL('image/png');
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $('#btn-download').attr('download', r+'.png').attr('href', newData);
  });

  </script>
{% endblock %}
