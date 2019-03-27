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
            <th>{{ l10n._('Invoice Name') }}</th>
            <td>{{ invoice.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Total Price') }}</th>
              <td class="text-right">{{ invoice.total_price|number_format }} (&#8363;)</td>
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
            </table>
          </div>
        </div>

        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-12">
            <h5 class="text-bold">{{ l10n._('List Products') }}</h5>
            {#{% if products is defined %}#}
            <table class="table table-bordered">
              <colgroup>
                <col class="col-5">
                <col class="col-2">
                <col class="col-1">
                <col class="col-4">
              </colgroup>
              <tbody>
              {#{% for product in products %}#}
              <tr>
                <th class="font-light">{{ product.name|e }}</th>
                <td class="text-right">(¥){{ product.price|number_format }}</td>
                <td class="text-right">{{ product.amount }}</td>
                <td><i>{{ product.remarks|e }}</i></td>
              </tr>
              {#{% endfor %}#}
              </tbody>
            </table>
            {#{% endif %}#}
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
            </ul>
          </div>

        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
{% endblock %}
