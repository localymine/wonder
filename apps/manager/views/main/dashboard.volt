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
                  <th style="width: 32px;"></th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                {% for product in products %}
                  <tr>
                    <td>{{ product.id }}</td>
                    <td>
                      <a href="javascript:void(0)" class="pop">
                        {{ utility.image(product.user_id, product.id, product.image) }}
                      </a>
                    </td>
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
        <div class="mb-max">
          <a href="/manager/brands/new" class="btn btn-lg btn-primary col-sm-12 col-xs-12">
            Brand
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/categories/new" class="btn btn-lg btn-primary col-md-12 col-xs-12">
            Category
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/clients/new" class="btn btn-lg btn-info col-md-12 col-xs-12">
            Client
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/members/new" class="btn btn-lg btn-info col-md-12 col-xs-12">
            Member
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-3">
        <div class="mb-max">
          <a href="/manager/invoices/new" class="btn btn-lg btn-danger col-sm-12 col-xs-12">
            Make Invoice
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <div class="mb-max">
          <a href="/manager/products/new" class="btn btn-lg btn-yahoo col-sm-12 col-xs-12">
            Product
            <i class="fa fa-plus"></i>
          </a>
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

    <div class="row">

      <div class="col-xs-12 col-sm-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">{{ l10n._('Most Brandname') }}</h3>
          </div>
          <div class="box-body">
            <canvas id="the-most-brandname" width="400" height="400"></canvas>
          </div>
        </div>
      </div>

    </div>

    {{ partial('partials/modal/image-enlarge') }}

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
      //
      var mBrand_dt = [{{ mBrand_dt }}];
      var dataTheMostBrand = {
        labels: [
          {{ mBrand_lb }}
        ],
        datasets : [{
          data: mBrand_dt,
          backgroundColor: palette('mpn65', mBrand_dt.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      };
      var ctxTheMostBrand = document.getElementById('the-most-brandname').getContext('2d');
      var chartTheMostBrand = new Chart(ctxTheMostBrand, {
        type: 'doughnut',
        data: dataTheMostBrand
      });
      //
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');
      });
    });
  </script>
{% endblock %}
