{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Inventory') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/inventory/index', l10n._('Manage Inentory')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">

    <div class="box overflow">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/inventory') }}

      </div>
    </div>

    {{ partial('partials/modal/chart-product') }}
    {{ partial('partials/modal/product-stock') }}
    {{ partial('partials/modal/product-sub-stock') }}
    {{ partial('partials/modal/image-enlarge') }}

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
  {{ javascript_include('js/Chart.min.js') }}
  {{ javascript_include('js/product.js') }}
  <script>
    $(function(){
      $('#table-products').DataTable({
//        "iDisplayLength": 50,
        "bPaginate": false,
        "bInfo" : false
      });

      $( "#fromDate" ).datepicker({dateFormat:'yy-mm-dd'});
      $( "#toDate" ).datepicker({dateFormat:'yy-mm-dd'});
    });
  </script>
{% endblock %}
