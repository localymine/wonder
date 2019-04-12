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

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">{{ l10n._('List To Order') }}</h3>
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

    </div>

    <div class="row">

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">{{ l10n._('Favorite Products') }}</h3>
          </div>
          <div class="box-body">
            <canvas id="the-most-order" width="400" height="400"></canvas>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">{{ l10n._('Most interested') }}</h3>
          </div>
          <div class="box-body">
            <canvas id="the-most-interested" width="400" height="400"></canvas>
          </div>
        </div>
      </div>

    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
  <script>
    $(function () {
      var mOrder_dt = [{{ mOrder_dt }}];
      var dataTheMostOrder = {
        labels: [
          {{ mOrder_lb }}
        ],
        datasets : [{
          data: mOrder_dt,
          backgroundColor: palette('mpn65', mOrder_dt.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      };
      var ctxTheMostOrder = document.getElementById('the-most-order').getContext('2d');
      var chartTheMostOrder = new Chart(ctxTheMostOrder, {
        type: 'doughnut',
        data: dataTheMostOrder
      });
      //
      var mInterested_dt = [{{ mInterested_dt }}];
      var dataTheMostInterested = {
        labels: [
          {{ mInterested_lb }}
        ],
        datasets : [{
          data: mInterested_dt,
          backgroundColor: palette('mpn65', mInterested_dt.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      };
      var ctxTheMostInterested = document.getElementById('the-most-interested').getContext('2d');
      var chartTheMostInterested = new Chart(ctxTheMostInterested, {
        type: 'doughnut',
        data: dataTheMostInterested
      });
    });
  </script>
{% endblock %}
