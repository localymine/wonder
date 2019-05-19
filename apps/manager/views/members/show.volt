{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
{{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Clients') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/clients/index', l10n._('Manage Client')) }}</li>
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
            <td>{{ client.id|e }}</td>
            </tr>
            <tr>
            <th>{{ type[client.type]|e }} {{ l10n._('Name') }}</th>
            <td>{{ client.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Country') }}</th>
              <td>{{ client.country.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Type') }}</th>
              <td>{{ type[client.type]|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Email') }}</th>
              <td>{{ client.email|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Phone') }}</th>
              <td>{{ client.phone|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Postal') }}</th>
              <td>{{ client.postal|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Address') }}</th>
              <td>{{ client.address|e }}</td>
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
              <th>{{ l10n._('Firstname') }}</th>
              <td>{{ client.firstname|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Lastname') }}</th>
              <td>{{ client.lastname|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Remarks') }}</th>
              <td>{{ client.remarks|nl2br }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Disabled') }}</th>
              <td>{% if client.disabled == 1 %}{{ l10n._('Disabled') }}{% endif %}</td>
            </tr>
            <tr>
            <tr>
              <th>{{ l10n._('Updated at') }}</th>
              <td>{{ date(l10n._('Y-m-d H:i:s'), client.updated|strtotime) }}</td>
            </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          {{ link_to('manager/clients/edit/'~client.id,l10n._('<i class="fa fa-pencil"></i> Edit'),'class':'btn btn-success pull-left') }}

          {{ link_to('manager/clients/delete/'~client.id,l10n._('<i class="fa fa-trash"></i> Delete'),'class':'btn btn-danger pull-left') }}

        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
{% endblock %}
