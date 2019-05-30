{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n.__('Manage Products','product') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/products/index', l10n.__('Manage Products','product')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output()| escape }}

    <div class="box overflow">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
        {{ link_to('manager/products/new/',l10n._('<i class="fa fa-file"></i><span>New</span>'),'class':'btn btn-primary btn-sm xcenter') }}

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/products') }}

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
  {{ javascript_include('js/product.js') }}
  <script>
    $(function(){
      $('#table-products').DataTable({
//        "iDisplayLength": 50,
        "bPaginate": false,
        "bInfo" : false
      });
      //
      $('[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).attr('checked',true).val(1);
      }).on('ifUnchecked', function(evt) {
        $(this).removeAttr('checked').val(0);
      });
      //
      $( "#fromDate" ).datepicker({dateFormat:'yy-mm-dd'});
      $( "#toDate" ).datepicker({dateFormat:'yy-mm-dd'});

      var clipboard = new ClipboardJS('.acopy');

      clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();
      });

      clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
      });

    });
  </script>
{% endblock %}
