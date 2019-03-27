{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ page_heading|e }}</h1>
    <ol class="breadcrumb">
      <li>{{ l10n._('<i class="fa fa-dashboard"></i> DashBoard') }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}
    <div class="row">
      <div class="col-xs-12 col-sm-9">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">{{ l10n._('Products need to order right now') }}</h3>
          </div>
          <div class="box-body">
            <div class="low-inventory">
              <table class="table table-responsive">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                {% for product in products %}
                  <tr>
                    <td>{{ product.id }}</td>
                    <td>{{ product.name|e }}</td>
                    <td class="text-right">{{ product.price|number_format }}</td>
                    <td class="text-right">{{ product.quantity }}</td>
                  </tr>
                {% endfor %}
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <div class="col-xs-12 col-sm-3">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">{{ l10n._('Servicer Profile') }}</h3>
          </div>
          <div class="box-body">
            <dl class="prof">
              <dt>{{ l10n._('Manager Name') }}</dt>
              <dd>{{ user.name|e }}</dd>
              <dt>{{ l10n._('Role') }}</dt>
              <dd>{{ user.role.name|e }}</dd>
              <dt>{{ l10n._('Email Address') }}</dt>
              <dd>{{ user.email|e }}</dd>
            </dl>
          </div>
        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
{% endblock %}
