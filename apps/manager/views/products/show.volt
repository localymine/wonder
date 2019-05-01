{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Products') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/products/index', l10n._('Manage Products')) }}</li>
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
                <td>{{ product.id|e }}</td>
              </tr>
              <tr>
                <th>{{ l10n._('Name') }}</th>
                <td>{{ product.name|e }}</td>
              </tr>
              <tr>
                <th>{{ l10n._('SalePrice') }}</th>
                <td class="text-right">{{ product.price|number_format }} (&#8363;)</td>
              </tr>
              <tr>
                <th>{{ l10n._('Wholesale Price') }}</th>
                <td class="text-right">{{ product.wholesale_price|number_format }} (&#8363;)</td>
              </tr>
              <tr>
                <th>{{ l10n._('Purchase Price (avg)') }}</th>
                <td class="text-right">{{ product.purchase_price|number_format }} (¥)</td>
              </tr>
              <tr>
                <th>{{ l10n._('Quantity') }}</th>
                <td class="text-right">{{ product.quantity }}</td>
              </tr>
              <tr>
                <th>{{ l10n._('Unit') }}</th>
                <td class="text-right">{{ product.unit }}</td>
              </tr>
              <tr>
                <th>{{ l10n._('Size') }}</th>
                <td class="text-right">{{ product.size }}</td>
              </tr>
              <tr>
                <th>{{ l10n._('Type') }}</th>
                <td>{{ product.category.name|e }}</td>
              </tr>
              <tr>
                <th>{{ l10n._('Brand') }}</th>
                <td>{{ product.brand.name|e }}</td>
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
                <th>{{ l10n._('Product Image') }}</th>
                <td>
                  {#{{ image('manager/products/image/' ~ product.id, 'class':'img-thumbnail', 'style':'max-width:200px') }}#}
                  <a href="#" class="pop">
                    {{ utility.image(product.user_id, product.id, product.image, ['height:150px']) }}
                  </a>
                </td>
              </tr>
              <tr>
                <th>{{ l10n._('Description') }}</th>
                <td>
                  <div class="description">{{ utility.make_links_from_http(product.description|nl2br) }}</div>
                </td>
              </tr>
              <tr>
                <th>{{ l10n._('Remarks') }}</th>
                <td>
                  <div class="remarks">{{ utility.make_links_from_http(product.remarks|nl2br) }}</div>
                </td>
              </tr>
              <tr>
                <th>{{ l10n._('Disabled') }}</th>
                <td>{% if product.disabled == 1 %}{{ l10n._('Disabled') }}{% endif %}</td>
              </tr>
              <tr>
                <th>{{ l10n._('Updated at') }}</th>
                <td>{{ date(l10n._('Y-m-d H:i:s'), product.updated|strtotime) }}</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row row-gutter-20">
          <div class="col-xs-12 col-sm-12">
            <canvas id="chart-price"></canvas>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          {{ link_to('manager/products/edit/'~product.id,l10n._('<i class="fa fa-pencil"></i> Edit'),'class':'btn btn-success pull-left') }}

          {{ link_to('manager/products/delete/'~product.id,l10n._('<i class="fa fa-trash"></i> Delete'),'class':'btn btn-danger pull-left') }}

          <div class="btn-group dropup pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cogs"></i> {{ l10n._('Other Options') }}</button>
            <ul class="dropdown-menu">
              <li>{{ link_to('manager/products/new/',l10n._('New')) }}</li>
            </ul>
          </div>

        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  <script>
    $(function () {
      $('.remarks , .description').readmore({
        speed: 75,
        lessLink: '<a href="#">Read less</a>',
        afterToggle: function(trigger, element, expanded) {
          if(! expanded) { // The "Close" link was clicked
            $('html, body').animate( { scrollTop: element.offset().top }, {duration: 100 } );
          }
        }
    });
      //
      var price_dt = [{{ price_dt }}];
      var price_wholesale_dt = [{{ price_wholesale_dt }}];
      var dataPrice = {
        labels: [
          {{ price_lb }}
        ],
        datasets : [{
          label: 'Sale Price',
          data: price_dt,
          borderWidth: 2,
          backgroundColor: 'rgba(255,23,68,1)',
          borderColor: 'rgba(255,23,68,1)',
          pointRadius: 5,
          fill: false
        },{
          label: 'Wholesale Price',
          data: price_wholesale_dt,
          borderWidth: 2,
          backgroundColor: 'rgba(85,139,47,1)',
          borderColor: 'rgba(85,139,47,1)',
          pointRadius: 5,
          fill: false
        }
        ]
      };
      var options = {
        responsive: true,
          tooltips: {
          mode: 'index',
            intersect: false,
            callbacks: {
            label: function (tooltipItems, data) {
              return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + '₫';
            },
            footer: function (tooltipItems, data) {
              return '^^';
            }
          }
        },
        hover: {
          mode: 'index',
            intersect: false
        },
        scales: {
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Price'
            },
            ticks: {
              beginAtZero: false
            }
          }]
        }
      };
      var ctxPrice = document.getElementById('chart-price').getContext('2d');
      var chartPrice = new Chart(ctxPrice, {
        type: 'line',
        data: dataPrice,
        options: options
    });
      //
    });
  </script>
{% endblock %}
