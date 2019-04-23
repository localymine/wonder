{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
{{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Transports') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/transports/index', l10n._('Manage Transports')) }}</li>
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
            <td>{{ transport.id|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Client') }}</th>
              <td>
                {{ transport.client.name|e }}
                {{ link_to('manager/clients/show/'~transport.client_id, '<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>', 'class':'client') }}
              </td>
            </tr>
            <tr>
              <th>{{ l10n._('Phone') }}</th>
              <td>
                {{ transport.client.phone|e }}
              </td>
            </tr>
            <tr>
              <th>{{ l10n._('Address') }}</th>
              <td>
                {{ transport.client.address|e }}
              </td>
            </tr>
            <tr>
              <th>{{ l10n._('Transport Issue') }}</th>
              <td>
                {{ transport.name|e }}
              </td>
            </tr>
            <tr>
              <th>{{ l10n._('Flight Date') }}</th>
              <td>{{ utility.substr(transport.flight_date,0,10)|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Status') }}</th>
              <td>{{ status[transport.status]|e }}</td>
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
              <th>{{ l10n._('Total Invoices') }}</th>
              <td class="text-right">{{ transport.total|number_format }} (&#8363;)</td>
            </tr>
            <tr>
              <th>{{ l10n._('Total OtherCosts') }}</th>
              <td class="text-right">{{ transport.total_others|number_format }} (&#8363;)</td>
            </tr>
            <tr>
              <th>{{ l10n._('Total') }}</th>
              <td class="text-right">{{ (transport.total + transport.total_others)|number_format }} (&#8363;)</td>
            </tr>
            <tr>
              <th>{{ l10n._('Remarks') }}</th>
              <td>{{ transport.remarks|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Disabled') }}</th>
              <td>{% if transport.disabled == 1 %}{{ l10n._('Disabled') }}{% endif %}</td>
            </tr>
            <tr>
            <tr>
              <th>{{ l10n._('Updated at') }}</th>
              <td>{{ date(l10n._('Y-m-d H:i:s'), transport.updated|strtotime) }}</td>
            </tr>
            </table>
          </div>
        </div>

        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-6">
            <h4>{{ l10n._('Invoices') }}</h4>
            <div id="accordion">
            {% for transinvoice in transportInvoice %}
              <h5>
                {{ transinvoice.invoice.id }} - {{ transinvoice.invoice.client.name }} <span style="float:right;">{{ transinvoice.invoice.total_price|number_format }} (&#8363;)</span>
              </h5>
              <div style="padding: 1em 1em;">
                <p>
                  {{ transinvoice.invoice.created }} {{ link_to('manager/invoices/show/'~transinvoice.invoice.id, '<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>', 'class':'client') }}
                </p>
                <table class="table table-responsive">
                  {% for invoice_detail in transinvoice.invoice.invoicedetail %}
                  <tr>
                    <td>{{ invoice_detail.product.name }}</td>
                    <td class="text-right">{{ invoice_detail.quantity }}</td>
                    <td class="text-right">{{ invoice_detail.price|number_format }}</td>
                  </tr>
                  {% endfor %}
                </table>
              </div>
            {% endfor %}
            </div>
          </div>

          <div class="col-xs-12 col-sm-6">
            <h4>{{ l10n._('OtherCosts') }}</h4>
            <table class="table table-bordered">
              <colgroup>
                <col class="col-5">
                <col class="col-7">
              </colgroup>
              <tbody>
              {% for transothercost in transportOtherCost %}
                <tr>
                  <th class="font-light" style="padding-left:15px"><i class="fa fa-dot-circle-o"></i>{{ transothercost.name }}</th>
                  <td class="text-right">{{ transothercost.price|number_format }} (&#8363;)</td>
                </tr>
              {% endfor %}
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          {{ link_to('manager/transports/edit/'~transport.id,l10n._('<i class="fa fa-pencil"></i> Edit'),'class':'btn btn-success pull-left') }}

          {{ link_to('manager/transports/delete/'~transport.id,l10n._('<i class="fa fa-trash"></i> Delete'),'class':'btn btn-danger pull-left') }}

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cogs"></i> {{ l10n._('Other Options') }}</button>
            <ul class="dropdown-menu">
              <li>{{ link_to('manager/transports/export/'~transport.id,l10n._('Export Transport')) }}</li>
              <li>{{ link_to('manager/transports/exportMore/'~transport.id,l10n._('Export Transport (more)')) }}</li>
              <li>{{ link_to('manager/transports/exportList/'~transport.id,l10n._('Export Products')) }}</li>
            </ul>
          </div>

        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  <script>
    $( function() {
      $( "#accordion" ).accordion({
        collapsible: true
      });
    } );
  </script>
{% endblock %}
