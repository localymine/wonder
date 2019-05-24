{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
{{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Incomes') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/incomes/index', l10n._('Manage Income')) }}</li>
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
            <td>{{ income.id|e }}</td>
            </tr>
            <tr>
            <th>{{ l10n._('Name') }}</th>
            <td>{{ income.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Responsible Person') }}</th>
              <td>{{ income.member.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Type') }}</th>
              <td>{{ income.type.name|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Amount') }}</th>
              <td>{{ income.amount|e }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Execute Date') }}</th>
              <td>{{ date('Y-m-d H:i', income.exec_date|strtotime) }}</td>
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
              <td>{{ income.remarks|nl2br }}</td>
            </tr>
            <tr>
              <th>{{ l10n._('Disabled') }}</th>
              <td>{% if income.disabled == 1 %}{{ l10n._('Disabled') }}{% endif %}</td>
            </tr>
            <tr>
            <tr>
              <th>{{ l10n._('Updated at') }}</th>
              <td>{{ date(l10n._('Y-m-d H:i:s'), income.updated|strtotime) }}</td>
            </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="action-area">
          {{ link_to('manager/incomes/edit/'~income.id,l10n._('<i class="fa fa-pencil"></i> Edit'),'class':'btn btn-success pull-left') }}

          {{ link_to('manager/incomes/delete/'~income.id,l10n._('<i class="fa fa-trash"></i> Delete'),'class':'btn btn-danger pull-left') }}

        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
{% endblock %}
